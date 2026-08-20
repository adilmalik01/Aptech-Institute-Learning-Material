<?php



// $my_name = "Adil";
// echo $my_name;
// $age = 123;
// echo $age;
// $is_Active = false;

// echo $my_name;
// echo $age;
// echo $is_Active;



// $num1 = 10;
// $num2 = 10;

// $sum = $num1 * $num2;
// echo $sum;


// $num1 = 10;
// $num2 = 30;

// $sum = $num1 + $num2;

// $sum += 10;

// echo $sum;






//  Comparision Operators
// == < >  <=  >=  !

// echo 5 < 5;

// echo "<br>";

// echo 5 > 5;
// echo "<br>";

// echo 5 <= 5;
// echo "<br>";

// echo 5 >= 5;
// echo "<br>";

// echo 5 == 5;
// echo "<br>";

// echo 5 != 5;



// $email  = "adil@gmail.com";
// $password = "12345678";

// $verify = $email == "adil@gmail.com" && $password == "12345678" ? "Login Success" : "Login Failed";


// echo $verify;
// if($verify){
//     echo "Login Success";  
// }else{
//     echo "Login Failed";
// }



// echo $students[0];
// echo "<br>";
// echo $students[1];
// echo "<br>";
// echo $students[2];
// echo "<br>";
// echo $students[3];
// echo "<br>";

// for($i = 0; $i < Count($students); $i++){
//     echo $students[$i];
//     echo "<br>";
// }




// $students = ["Adil", "Ali", "Ahmed", "Ahsan"];

// echo $students[1];

// foreach($students as $student){
//     echo $student . "<br>";
// }



// $students = [
//     "name" => "Adil",
//     "age" => 20,
//     "is_Active" => true
// ];

// echo $students["name"];
// echo $students["age"];
// echo $students["is_Active"];



$posts = [
    [
        "title" => "Getting Started with PHP",
        "description" => "Learn the basics of PHP and how to build dynamic web applications.",
        "time" => "2026-04-01 10:00:00",
        "author" => "Adil",
    ],
    [
        "title" => "Understanding JavaScript Closures",
        "description" => "A deep dive into closures and how they work in JavaScript.",
        "time" => "2026-04-01 12:30:00",
        "author" => "Hamza",
    ],
    [
        "title" => "Laravel vs Core PHP",
        "description" => "Comparison between Laravel framework and core PHP development.",
        "time" => "2026-04-02 09:15:00",
        "author" => "Ahmet",
    ],
    [
        "title" => "CSS Flexbox Guide",
        "description" => "Master Flexbox layout with practical examples.",
        "time" => "2026-04-02 02:45:00",
        "author" => "Fatma",
    ],
    [
        "title" => "React Basics for Beginners",
        "description" => "Introduction to React components, props, and state.",
        "time" => "2026-04-03 11:20:00",
        "author" => "Ayse",
    ],
    [
        "title" => "Building REST APIs in Node.js",
        "description" => "Step-by-step guide to building scalable APIs using Node.js.",
        "time" => "2026-04-03 03:10:00",
        "author" => "Mehmet",
    ],
    [
        "title" => "MySQL Optimization Tips",
        "description" => "Improve your database performance with these tips.",
        "time" => "2026-04-04 08:00:00",
        "author" => "Ali",
    ],
    [
        "title" => "Authentication in Web Apps",
        "description" => "Learn JWT and session-based authentication methods.",
        "time" => "2026-04-04 06:25:00",
        "author" => "Zara",
    ],
    [
        "title" => "Introduction to Tailwind CSS",
        "description" => "Utility-first CSS framework for rapid UI development.",
        "time" => "2026-04-05 01:50:00",
        "author" => "Usman",
    ],
    [
        "title" => "Deploying Apps on VPS",
        "description" => "Guide to deploying your application on a VPS server.",
        "time" => "2026-04-05 07:40:00",
        "author" => "Ahmed",
    ]
];


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOGS</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f4f4;
        }

        .cards{
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
        }


        .card{
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 20px;
            width: 25%;
        }
    </style>
</head>

<body>

    <div class="cards">
        <?php foreach ($posts as $post): ?>



            <div class="card">
                <h2><?php echo $post["title"] ?></h2>
                <p><?php echo $post["description"] ?></p>
                <span><?php echo $post["time"] ?></span>
                <span>Author: <?php echo $post["author"] ?></span>
            </div>

            

        <?php endforeach ?>

    </div>



</body>

</html>