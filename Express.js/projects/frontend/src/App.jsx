import logo from './logo.svg';

import './App.css';
import React from 'react';

function App() {


  let UrlRef = React.createRef();




  const GenerateUrl = async () => {
    try {
      const response = await fetch('http://localhost:5000/generate-url', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({ longUrl: UrlRef.current.value })
      });
      const data = await response.json();
      console.log(data);
    }
    catch (error) {
      console.error('Error:', error);
    }
  }


  return (
    <div className="App">
      <h1>CHECK SERVER</h1>
      <h1>CREATE SHORT URL</h1>
      < input ref={UrlRef} type="text" placeholder="Enter your long URL here" />
      <button onClick={GenerateUrl}>Generate Short URL</button>

      <h1>Enter Short Code</h1>
      < input type="text" placeholder="Enter your short code here" />

    </div>
  );
}

export default App;
