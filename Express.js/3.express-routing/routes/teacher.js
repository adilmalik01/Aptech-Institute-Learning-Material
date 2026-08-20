import { Router } from "express";
import { ADD_TEACHER, DELETE_TEACHER, GET_TEAHCER, UPDATE_TEACHER } from "../controller/teacher";


const router = Router()


router.get('/user', GET_TEAHCER);
router.post('/add-teacher', ADD_TEACHER)
router.delete('/del-teacher', DELETE_TEACHER)
router.put('/edit-teacher', UPDATE_TEACHER)


export default router;