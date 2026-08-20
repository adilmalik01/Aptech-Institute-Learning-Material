


let first_number = parseInt( prompt("Enter your first number :") )

let operator = prompt(`Choose your operator number :
1) Add
2) Subtract
3) Multiply `)

let second_number = +prompt("Enter your second number :")

if (operator == "1") {
    alert(first_number + second_number)
}else if(operator == "2"){
   alert(first_number - second_number)
}else if(operator == "3"){
    alert(first_number * second_number)
}else{
    alert("Invalid Operator")
}

















