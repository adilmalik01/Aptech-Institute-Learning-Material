import express from 'express';
import WeatherRouter from "./routes/weather.js";
import cors from 'cors';
const app = express();


app.use(express.json());

const allowedOrigins = ['http://localhost:3000', 'http://example.com'];
app.use(cors({
    origin: allowedOrigins,
    "methods": "GET,HEAD,PUT,PATCH,POST,DELETE",
}))





app.get('/', (req, res) => {
    res.send('Hello Ali!');
});


app.use("/v1", WeatherRouter);




const port = 5000;

app.listen(port, () => {
    console.log(`Example app listening on port ${port}`);
});