

let userEmail = prompt("Enter your email !")
let userPassword = parseInt(prompt("Enter your password !"))



let emailDb = "adil@gmail.com"
let passwordDb = 12345



let logic = userEmail === emailDb && userPassword === passwordDb


if (logic) {
    console.log("USER LOGIN");

    window.location.href = "./index.html"
} else {
    console.log("Invalid Email Or Password");
}


























