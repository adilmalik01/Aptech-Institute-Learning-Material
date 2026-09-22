import axios from 'axios';
import express from 'express';
import { ConnectDb } from './config/db.js';
import StudentRouter from './routes/student/student.js';

const app = express();

app.use(express.json());

ConnectDb();

app.get('/', (req, res) => {
    res.send('Hello Ali!');
});




app.get('/user', (req, res) => {
    res.send({ "name": "Ali", "age": 19 });
});


app.get('/products', async (req, res) => {

    try {
        let response = await axios.get('https://fakestoreapi.com/products')
        res.send(response.data)

    } catch (error) {
        res.send(error.message)
    }





    // res.send([
    //     { "id": 1, "name": "Product 1", "price": 100 },
    //     { "id": 2, "name": "Product 2", "price": 200 }
    // ]);
})






app.get('/product/:id', async (req, res) => {


    let id = req.params.id;

    try {
        let response = await axios.get(`https://fakestoreapi.com/products/${id}`)
        res.send(response.data)

    } catch (error) {
        res.send(error.message)
    }


})




app.use("/v1/student", StudentRouter)



const port = 5000;
app.listen(port, () => {
    console.log(`Example app listening on port ${port}`);
});