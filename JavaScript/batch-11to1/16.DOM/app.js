let userBtn = document.getElementById("btn")
let first_number = document.getElementById("firstnumber")
let second_number = document.getElementById("secondnumber")
let operator = document.getElementById("operator")
let resultH1 = document.getElementById("result")

// console.log(userBtn);



userBtn.addEventListener("click", () => {
    // console.log("Hello JS")

    // console.log(first_number.value);
    // console.log(second_number.value);
    // console.log(operator.value);


    let result = 0

    if (operator.value == "+") {
        result = Number(first_number.value) + Number(second_number.value)
    } else if (operator.value == "-") {
        result = Number(first_number.value) - Number(second_number.value)

    } else if (operator.value == "*") {
        result = Number(first_number.value) * Number(second_number.value)
    } else {
        console.log("Invalid Operator");
    }

    resultH1.innerHTML = `Your Calculation Result: ${result}`


})
