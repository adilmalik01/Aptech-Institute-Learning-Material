import express from 'express';
import StudentRouter from "./routes/student.js"
import TeacherRouter  from "./routes/teacher.js"
const app = express();



app.get('/', (req, res) => {
    res.send('Hello Ali!');
});


app.use("/v1",StudentRouter)
app.use("/v1",TeacherRouter)

const port = 5000;

app.listen(port, () => {
    console.log(`Example app listening on port ${port}`);
});