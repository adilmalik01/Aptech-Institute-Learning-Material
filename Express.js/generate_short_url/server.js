import express from 'express';
import cors from 'cors';
const app = express();


let urls = [];

app.use(express.json()) // body parser
app.use(cors()) // cors

app.get('/', (req, res) => {
    res.send('GENERATE SHORT URL PROJECT !');
});



app.post("/generate-url", (req, res) => {


    let url = req.body.url

    let short_url = {
        orignal_url: url,
        short_code: Math.random().toString(36).substring(2, 2 + 6).toLowerCase()
    }

    urls.push(short_url)
    res.send({
        "message": "SHORT URL GENERATED SUCCESSFULLY",
        "data": short_url
    });
})


app.get('/urls', (req, res) => {
    res.send(urls);
});



app.get('/url/:code', (req, res) => {

    let short_Code = req.params.code

    let response = urls.find((item) => item.short_code == short_Code)
    if (response) {
        res.redirect(response.orignal_url);

    } else {
        res.send({ "message": "SHORT CODE NOT FOUND" });

    }

});






const port = 5000;

app.listen(port, () => {
    console.log(`Example app listening on port ${port}`);
});





