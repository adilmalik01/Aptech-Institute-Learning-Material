// function greet(){
//     console.log("Hello Adil");
// }

// greet()
// greet()
// greet()
// greet()
// greet()
// greet()




// console.log("Adil");
// console.log("Adil");
// console.log("Adil");
// console.log("Adil");
// console.log("Adil");
// console.log("Adil");




// console.log("Adil");
// console.log("Adil");
// console.log("Adil");
// console.log("Adil");
// console.log("Adil");
// console.log("Adil");



// console.log("Adil");
// console.log("Adil");
// console.log("Adil");
// console.log("Adil");
// console.log("Adil");
// console.log("Adil");

// function printStudentName(name) {

//     console.log(name);

// }


// printStudentName("Adil")
// printStudentName("Ali")

// const printStudentName = (name) => {
//     console.log(name);
// }

// printStudentName("Adil")
// printStudentName("Ali")
// printStudentName("Hamza")





// const add = (num1, num2) => {
//     let sum = num1 + num2
//     console.log(sum);

// }

// add(1, 20)





// Step 1: User Data
// first number
// operator
// second number

// STEP 2:  Conditions Apply
// Using Comparision


// STEP 3: IF ELSE


// STEP 4: Calculation Result 

// STEP 1 

let userNum1 = +prompt("Enter your first number !")
let operator = prompt(`Select Any One Operator
    1) Add
    2) Subtract
    3)Multiply
    `)

let userNum2 = +prompt("Enter your second number !")




if (operator == "1") {
    add(userNum1, userNum2)
} else if (operator == "2") {
    Subtract(userNum1, userNum2)
} else if (operator == "3") {
    Multiply(userNum1, userNum2)
} else {
    console.log("Invalid Operator")
}



function add(num1, num2) {
    console.log(num1 + num2);
}

function Subtract(num1, num2) {
    console.log(num1 - num2);
}


function Multiply(num1, num2) {
    console.log(num1 * num2);
}
