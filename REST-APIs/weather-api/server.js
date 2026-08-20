import express from 'express';
import WeatherRouter from "./routes/weather.js";
const app = express();


app.use(express.json());


app.get('/', (req, res) => {
    res.send('Hello Ali!');
});


app.use("/v1", WeatherRouter);




const port = 5000;

app.listen(port, () => {
    console.log(`Example app listening on port ${port}`);
});