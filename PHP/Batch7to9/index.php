<?php


// $my_name = "Adil Malik";
// echo  $my_name;

// echo "Hello World! This is my first Index File.";


// $students = ["Adil Malik", "Ali Raza", 20,true];


// foreach($students as $student){
//     echo $student . "<br>";
// }


// echo $students;
// var_dump($students);




// $students = [
//     [
//         "name" => "Adil Malik",
//         "age" => 20,
//         "city" => "Karachi"
//     ],
//     [
//         "name" => "Ali Raza",
//         "age" => 22,
//         "city" => "Lahore"
//     ],

//     [
//         "name" => "Ali ",
//         "age" => 22,
//         "city" => "Pata nh"
//     ]
// ];


// // var_dump($students);

// foreach ($students as $student) {
//     echo "Name: " . $student["name"] . "<br>";
//     echo "Age: " . $student["age"] . "<br>";
//     echo "City: " . $student["city"] . "<br><br>";
// }




//  $name = "Adil";

//  echo $name == "Ail";



$email = "adil@gmail.com";
$password = "1234";

$condition = $email == "adil@gmail.com" && $password == "1234";

// echo $condition;

// if($condition){
//     echo "User Login";
// }else{
//     echo "Invalid Email or Password";
// }


switch($condition){
    case true:
      echo "User Login";
      break;
    case false:
      echo "Invalid Email Or Password";
      break;
    default :
      echo  "Invalid Data";  
}








?>



<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{
            background-color: lightblue
        }
    </style>
</head>
<body>




   <h1><?php   echo "Hello, World!" ?></h1>
    
</body>
</html> -->