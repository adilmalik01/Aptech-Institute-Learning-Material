



let firstNumber = parseInt(prompt("Enter your first Number :"))
let operator = prompt(`
    Slect your operator for calculation
    1. Addition (+)
    2. Subtraction (-)
    3. Multiplication (*)
    `)
let secondNumber = parseInt(prompt("Enter your second Number"))



switch (operator) {

    case "1":
        alert(`Result : ${firstNumber} + ${secondNumber} =  ${firstNumber + secondNumber}`);
        break;
    case "2":
        alert(`Result : ${firstNumber} - ${secondNumber} =  ${firstNumber - secondNumber}`);
        break;

    case "3":
        alert(`Result : ${firstNumber} x ${secondNumber} =  ${firstNumber * secondNumber}`);
        break;

    default:
        alert("Invalid Numbers for Calculation");
}












































