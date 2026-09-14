import express from 'express';
import URL from "./routes/url.js";
import cors from 'cors';
import { ConnectDb } from "./config/db.js";
const app = express();


app.use(express.json());

const allowedOrigins = ['http://localhost:3000', 'http://localhost:3001'];
app.use(cors({
    origin: allowedOrigins,
    "methods": "GET,HEAD,PUT,PATCH,POST,DELETE",
}))



ConnectDb();


app.get('/', (req, res) => {
    res.send('Hello Server!');
});


app.use("/api/v1", URL);




const port = 5000;

app.listen(port, () => {
    console.log(`Example app listening on port ${port}`);
});