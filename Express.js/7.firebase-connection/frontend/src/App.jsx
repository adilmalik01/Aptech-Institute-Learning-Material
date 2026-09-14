import React, { useState, useRef, useCallback } from 'react';
import './App.css';

const API_BASE = 'http://localhost:5000/api/v1';
const REQUEST_TIMEOUT_MS = 10000;

const TABS = [
  { id: 'create', label: 'Shorten' },
  { id: 'read', label: 'Look up' },
  { id: 'update', label: 'Edit' },
  { id: 'delete', label: 'Remove' },
];

// ---- helpers -------------------------------------------------------------

/** Basic client-side URL sanity check before we ever hit the network. */
function isLikelyValidUrl(value) {
  try {
    const url = new URL(value);
    return url.protocol === 'http:' || url.protocol === 'https:';
  } catch {
    return false;
  }
}

/** Safely reads a response body: handles empty bodies and non-JSON bodies. */
async function safeReadJson(response) {
  const text = await response.text();
  if (!text) return null;
  try {
    return JSON.parse(text);
  } catch {
    return null;
  }
}

/** Maps a non-ok HTTP response to a user-facing message. */
function messageForStatus(status, data, fallback) {
  if (data && data.message) return data.message;
  switch (status) {
    case 400:
      return 'That request looks invalid. Double-check the fields and try again.';
    case 401:
    case 403:
      return "You don't have permission to do that.";
    case 404:
      return 'No matching short code was found.';
    case 409:
      return 'That short code already exists.';
    case 429:
      return 'Too many requests — please slow down and try again shortly.';
    case 500:
    case 502:
    case 503:
      return 'The server ran into a problem. Please try again in a moment.';
    default:
      return fallback;
  }
}

/**
 * Centralized fetch wrapper.
 * Returns { ok, message, data, status } and never throws for HTTP errors —
 * only for network/timeout failures, which are caught by the caller.
 */
async function apiRequest(path, options = {}, fallbackErrorMessage = 'Something went wrong.') {
  const controller = new AbortController();
  const timeoutId = setTimeout(() => controller.abort(), REQUEST_TIMEOUT_MS);

  let response;
  try {
    response = await fetch(`${API_BASE}${path}`, {
      ...options,
      signal: controller.signal,
    });
  } catch (error) {
    if (error.name === 'AbortError') {
      throw new Error('The request timed out. Is the server running and reachable?');
    }
    throw new Error('Could not reach the server. Is it running?');
  } finally {
    clearTimeout(timeoutId);
  }

  // 204 No Content (common for DELETE) has no body to parse.
  const data = response.status === 204 ? null : await safeReadJson(response);

  if (!response.ok) {
    return {
      ok: false,
      status: response.status,
      message: messageForStatus(response.status, data, fallbackErrorMessage),
      data: null,
    };
  }

  return { ok: true, status: response.status, message: null, data };
}

function App() {
  const [activeTab, setActiveTab] = useState('create');
  const [loading, setLoading] = useState(false);
  const [result, setResult] = useState(null); // { ok: bool, message: string, data?: object }

  const longUrlRef = useRef();
  const lookupCodeRef = useRef();
  const editCodeRef = useRef();
  const editUrlRef = useRef();
  const deleteCodeRef = useRef();

  const runRequest = useCallback(async (fn) => {
    setLoading(true);
    setResult(null);
    try {
      const outcome = await fn();
      setResult(outcome);
    } catch (error) {
      setResult({ ok: false, message: error.message || 'Could not reach the server. Is it running?' });
    } finally {
      setLoading(false);
    }
  }, []);



  const handleCreate = () => runRequest(async () => {
    const longUrl = longUrlRef.current.value.trim();
    if (!longUrl) return { ok: false, message: 'Enter a URL to shorten.' };
    if (!isLikelyValidUrl(longUrl)) {
      return { ok: false, message: 'That doesn\u2019t look like a valid URL. Include http:// or https://.' };
    }

    const outcome = await apiRequest('/generate-url', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ longUrl }),
    }, 'Could not shorten that URL.');

    if (!outcome.ok) return outcome;
    return { ok: true, message: 'Short link created.', data: outcome.data };
  });

  const handleRead = () => runRequest(async () => {
    const code = lookupCodeRef.current.value.trim();
    if (!code) return { ok: false, message: 'Enter a short code to look up.' };

    const outcome = await apiRequest(
      `/url?code=${encodeURIComponent(code)}`,
      { method: 'GET' },
      'No URL found for that code.'
    );

    if (!outcome.ok) return outcome;
    return { ok: true, message: 'URL found.', data: outcome.data };
  });

  const handleUpdate = () => runRequest(async () => {
    const code = editCodeRef.current.value.trim();
    const longUrl = editUrlRef.current.value.trim();
    if (!code || !longUrl) return { ok: false, message: 'Enter both the short code and the new URL.' };
    if (!isLikelyValidUrl(longUrl)) {
      return { ok: false, message: 'That doesn\u2019t look like a valid URL. Include http:// or https://.' };
    }

    const outcome = await apiRequest('/url', {
      method: 'PUT',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ code, longUrl }),
    }, 'Could not update that code.');

    if (!outcome.ok) return outcome;
    return { ok: true, message: 'Short link updated.', data: outcome.data };
  });

  const handleDelete = () => runRequest(async () => {
    const code = deleteCodeRef.current.value.trim();
    if (!code) return { ok: false, message: 'Enter a short code to remove.' };

    const outcome = await apiRequest(
      `/url/${encodeURIComponent(code)}`,
      { method: 'DELETE' },
      
      'Could not remove that code.'
    );

    if (!outcome.ok) return outcome;
    return { ok: true, message: 'Short link removed.' };
  });

  const [copied, setCopied] = useState(false);
  const handleCopy = async (text) => {
    try {
      await navigator.clipboard.writeText(text);
      setCopied(true);
      setTimeout(() => setCopied(false), 1500);
    } catch {
      // Clipboard API unavailable — silently ignore, the value is still visible.
    }
  };

  return (
    <div className="page">
      <aside className="intro">
        <div className="brand">
          <svg className="brand-mark" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18 30L30 18" stroke="currentColor" strokeWidth="3" strokeLinecap="round" />
            <path d="M21 12H15C9.477 12 5 16.477 5 22V22C5 27.523 9.477 32 15 32H18" stroke="currentColor" strokeWidth="3" strokeLinecap="round" />
            <path d="M27 36H33C38.523 36 43 31.523 43 26V26C43 20.477 38.523 16 33 16H30" stroke="currentColor" strokeWidth="3" strokeLinecap="round" />
          </svg>
          <span className="brand-name">shrtn</span>
        </div>

        <h1>Long links, cut down to size.</h1>
        <p className="lede">
          Paste any URL and get back a short code that points to it. Look codes up,
          repoint them, or retire them whenever you need to.
        </p>

        <dl className="how">
          <div className="how-row">
            <dt>Shorten</dt>
            <dd>Turn a long URL into a short code.</dd>
          </div>
          <div className="how-row">
            <dt>Look up</dt>
            <dd>See which URL a code points to.</dd>
          </div>
          <div className="how-row">
            <dt>Edit</dt>
            <dd>Point an existing code somewhere new.</dd>
          </div>
          <div className="how-row">
            <dt>Remove</dt>
            <dd>Delete a code so it stops resolving.</dd>
          </div>
        </dl>
      </aside>

      <main className="panel">
        <nav className="tabs" role="tablist" aria-label="URL operations">
          {TABS.map((tab) => (
            <button
              key={tab.id}
              role="tab"
              aria-selected={activeTab === tab.id}
              className={`tab ${activeTab === tab.id ? 'tab-active' : ''}`}
              onClick={() => { setActiveTab(tab.id); setResult(null); }}
              disabled={loading}
            >
              {tab.label}
            </button>
          ))}
        </nav>

        <div className="card">
          {activeTab === 'create' && (
            <form className="form" onSubmit={(e) => { e.preventDefault(); handleCreate(); }}>
              <label htmlFor="long-url">URL to shorten</label>
              <input id="long-url" ref={longUrlRef} type="text" placeholder="https://example.com/a/very/long/path" disabled={loading} />
              <button type="submit" className="btn-primary" disabled={loading} aria-busy={loading}>
                {loading ? 'Shortening…' : 'Shorten URL'}
              </button>
            </form>
          )}

          {activeTab === 'read' && (
            <form className="form" onSubmit={(e) => { e.preventDefault(); handleRead(); }}>
              <label htmlFor="lookup-code">Short code</label>
              <input id="lookup-code" ref={lookupCodeRef} type="text" placeholder="e.g. aZ3kQ1" disabled={loading} />
              <button type="submit" className="btn-primary" disabled={loading} aria-busy={loading}>
                {loading ? 'Looking up…' : 'Look up URL'}
              </button>
            </form>
          )}

          {activeTab === 'update' && (
            <form className="form" onSubmit={(e) => { e.preventDefault(); handleUpdate(); }}>
              <label htmlFor="edit-code">Short code</label>
              <input id="edit-code" ref={editCodeRef} type="text" placeholder="e.g. aZ3kQ1" disabled={loading} />
              <label htmlFor="edit-url">New destination URL</label>
              <input id="edit-url" ref={editUrlRef} type="text" placeholder="https://example.com/new-destination" disabled={loading} />
              <button type="submit" className="btn-primary" disabled={loading} aria-busy={loading}>
                {loading ? 'Saving…' : 'Save changes'}
              </button>
            </form>
          )}

          {activeTab === 'delete' && (
            <form className="form" onSubmit={(e) => { e.preventDefault(); handleDelete(); }}>
              <label htmlFor="delete-code">Short code</label>
              <input id="delete-code" ref={deleteCodeRef} type="text" placeholder="e.g. aZ3kQ1" disabled={loading} />
              <button type="submit" className="btn-danger" disabled={loading} aria-busy={loading}>
                {loading ? 'Removing…' : 'Remove short link'}
              </button>
            </form>
          )}

          {result && (
            <div className={`result ${result.ok ? 'result-ok' : 'result-error'}`} role="status" aria-live="polite">
              <p className="result-message">
                <span className="result-icon" aria-hidden="true">{result.ok ? '✓' : '✕'}</span>
                {result.message}
              </p>
              {result.data && (
                <div className="result-data">
                  {result.data.shortUrl && (
                    <div className="result-row">
                      <span>Short URL</span>
                      <code>{result.data.shortUrl}</code>
                      <button
                        type="button"
                        className="btn-copy"
                        onClick={() => handleCopy(result.data.shortUrl)}
                      >
                        {copied ? 'Copied!' : 'Copy'}
                      </button>
                    </div>
                  )}
                  {result.data.code && (
                    <div className="result-row">
                      <span>Code</span>
                      <code>{result.data.code}</code>
                    </div>
                  )}
                  {result.data.longUrl && (
                    <div className="result-row">
                      <span>Destination</span>
                      <code>{result.data.longUrl}</code>
                    </div>
                  )}
                </div>
              )}
            </div>
          )}
        </div>
      </main>
    </div>
  );
}

export default App;