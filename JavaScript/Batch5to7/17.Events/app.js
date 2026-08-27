


let first_number = document.querySelector("#firstNumber")
let second_number = document.querySelector("#secondNumber")
let operator = document.querySelector("#operator")
let clickBtn = document.querySelector(".btn")






clickBtn.addEventListener("click", () => {



    switch (operator.value) {

        case "+":
            add(first_number.value, second_number.value)
            break;
        case "-":
            subtract(first_number.value, second_number.value)
            break;

        case "*":
            multiply(first_number.value, second_number.value)
            break;

        default:
            console.log("Invalid Numbers for Calculation");
    }


})







function add(firstNumber, secondNumber) {
    console.log(`Result : ${firstNumber} + ${secondNumber} =  ${Number(firstNumber) + Number(secondNumber)}`);
}

function subtract(firstNumber, secondNumber) {
    console.log(`Result : ${firstNumber} - ${secondNumber} =  ${firstNumber - secondNumber}`);
}


function multiply(firstNumber, secondNumber) {
    console.log(`Result : ${firstNumber} x ${secondNumber} =  ${firstNumber * secondNumber}`);
}


