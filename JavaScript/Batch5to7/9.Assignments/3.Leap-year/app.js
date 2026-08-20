let user_year = +prompt("Enter year :")

if ((user_year % 400 == 0) || (user_year % 4 == 0 && user_year % 100 != 0)) {
    console.log(user_year + " is a Leap year.");
} else {
    console.log(user_year + " is not a Leap year.");
}