import Router from 'express';
import { AddStudent } from '../../controllers/student/student.js';

const router = Router();




router.post('/add', AddStudent);






export default router;















