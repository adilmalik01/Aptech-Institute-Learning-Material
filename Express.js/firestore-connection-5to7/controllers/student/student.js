import { db } from "../../config/db.js";




const AddStudent = (req, res) => {

    let studentData = req.body;

    try {
        let insertStudent = db.collection('students').add(studentData);

        if (insertStudent) {
            res.status(200).send("Student added successfully");
        } 


    } catch (error) {
        res.status(500).send(error.message);
    }




}


export { AddStudent };