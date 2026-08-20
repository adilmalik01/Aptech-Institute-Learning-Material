let userUnits = +prompt("Enter your units !") // 50

let userBill = 0;
let perUnit = 0;


if (userUnits >= 0 && userUnits <= 100) {
    userBill = userUnits * 10
    perUnit = 10;
} else if (userUnits >= 101 && userUnits <= 200) {
    userBill = userUnits * 15
    perUnit = 15;

} else if (userUnits >= 201 && userUnits <= 300) {
    userBill = userUnits * 20
    perUnit = 20;

} else {
    userBill = userUnits * 25
    perUnit = 25;
}


console.log(`
    UNITS : ${userUnits}
    PER UNIT : ${perUnit}
    TOTAL BILL : ${userBill}
    `);


console.log("UNITS :" + userUnits + "PER UNITS :" + perUnit + "TOTAL BILL :" + userBill);
