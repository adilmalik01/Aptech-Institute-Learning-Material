
let firstNumber = parseInt(prompt("Enter your first Number :"))
let operator = prompt("Enter your operator : +/-*")
let secondNumber = parseInt(prompt("Enter your second Number"))




if (operator == "+") {
    // console.log(firstNumber + " + " + secondNumber + " " + "Result =" + firstNumber + secondNumber );

    alert(`Result : ${firstNumber} + ${secondNumber} =  ${firstNumber + secondNumber}`);
} else if (operator == "-") {
    alert(`Result : ${firstNumber} - ${secondNumber} =  ${firstNumber - secondNumber}`);

} else if (operator == "*") {
    alert(`Result : ${firstNumber} x ${secondNumber} =  ${firstNumber * secondNumber}`);

} else {
    alert("Invalid Numbers for Calculation");
}


















