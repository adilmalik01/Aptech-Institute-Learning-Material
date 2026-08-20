import { Router } from "express";

const router = Router()


router.get('/user', (req, res) => {
    res.send({ "name": "Ali", "age": 19 });
});


router.post('/add-student', (req, res) => {
    res.send("STUDENT POST ")
})



router.delete('/del-student', (req, res) => {
    res.send("STUDENT DELETE ")
})


router.put('/edit-student', (req, res) => {
    res.send("STUDENT UPDATED ")
})


export default router;