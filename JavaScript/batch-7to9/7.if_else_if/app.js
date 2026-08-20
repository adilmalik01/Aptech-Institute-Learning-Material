

let percentage = +prompt("Enter your percentage");

if (percentage > 90 && percentage < 100) {
    console.log("A1");

} else if (percentage > 80 && percentage < 90) {
    console.log("A+");

} else if (percentage > 70 && percentage < 80) {
    console.log("A");

} else if (percentage > 60 && percentage < 70) {
    console.log("B");

} else if (percentage > 50 && percentage < 60) {
    console.log("C");

} else if (percentage > 40 && percentage < 50) {
    console.log("D");

} else if (percentage > 30 && percentage < 40) {
    console.log("E");

} else if (percentage > 0 && percentage < 30) {
    console.log("Fail")

}else {
    console.log("INVALID PERCENTAGE");
}