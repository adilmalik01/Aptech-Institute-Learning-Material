


const GET_TEAHCER = (req, res) => {
    res.send({ "name": "Ali", "age": 19 });
}

const ADD_TEACHER = (req, res) => {
    res.send("TEACHER POST ")
}



const DELETE_TEACHER = (req, res) => {
    res.send("TEACHER DELETE ")
}


const UPDATE_TEACHER = (req, res) => {
    res.send("TEACHER UPDATED ")
}


export { ADD_TEACHER, DELETE_TEACHER, UPDATE_TEACHER, GET_TEAHCER }


























