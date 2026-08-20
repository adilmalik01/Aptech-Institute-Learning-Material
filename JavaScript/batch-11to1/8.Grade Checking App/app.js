

let percentage = parseInt(prompt("Enter your percentage:"))

if(percentage <= 100 &&  percentage >= 90){
  alert("A+ GRADE")
}else if(percentage <= 90 &&  percentage >= 80){
    alert("A1 GRADE")
}
else if(percentage <= 80 &&  percentage >= 70){
    alert("A GRADE")
}else if(percentage <= 70 &&  percentage >= 60){
    alert("B GRADE")
}else if(percentage <= 60 &&  percentage >= 50){
    alert("C GRADE")
}else if(percentage <= 50 &&  percentage >= 40){
    alert("D GRADE")
}else if(percentage >= 0 &&  percentage <= 40){
    alert("Fail")
}

else{
  console.log("Invalid Percentage")
}
