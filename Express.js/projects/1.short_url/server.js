import express from 'express';
import shortenUrl from 'shorten-url';

const app = express();




app.use(express.json());  // body parser middleware

let urls = [];



app.get('/', (req, res) => {
    res.json({
        "message": "URL Shortener API Is Running..",
    });
});



app.get('/urls', (req, res) => {
    res.json({
        "message": "URL Shortener API Is Running..",
        "urls": urls
    });
});




app.post('/api/shorturl', (req, res) => {

    let short_url = shortenUrl(req.body.url, 5)

    let generate_response = {
        "original_url": req.body.url,
        "url_length": urls.length + 1,
        "short_url": short_url
    }

    urls.push(generate_response)

    res.json(generate_response)
})

app.get('/shorturl/:code', (req, res) => {

    let shortCode = req.params.code;

    let get_url = urls.find((item) => item.short_url === shortCode);
    res.redirect(get_url.original_url);
});



const port = 5000;

app.listen(port, () => {
    console.log(`Example app listening on port ${port}`);
});

























