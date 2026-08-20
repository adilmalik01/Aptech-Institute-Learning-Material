import express from 'express';

const app = express();

app.get('/', (req, res) => {
    res.send('Hello Ali!');
});


app.get('/user', (req, res) => {
    res.send({ "name": "Ali", "age": 19 });
});


const port = 5000;
app.listen(port, () => {
    console.log(`Example app listening on port ${port}`);
});