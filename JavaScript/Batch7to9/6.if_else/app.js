

let userEmail = prompt("Enter your email")
let userPass = prompt("Enter your password")


let email = "Adil@gmail.com"
let password = 1234




let verify = email === userEmail && password === Number(userPass)
console.log(verify);

if (verify) {

    console.log("LOGIN");

    document.location.href = "./index.html"


} else {
    console.log("INVALID EMAIL OR PASSWORD");

}
































