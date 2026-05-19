<?php
echo 'hello world', 'Jacob'; //for multiple entry 
echo '<br />';
print 'Hello to PHP'; // not for multiple entry


$firstName = 'Mark Jacob'; //Camel case palagi 
$lastName = 'Capague'; //Camel casez

$title = 'PHP';
$heading = 'Reiniel Anjelo Talplacido';
$body = 'San Darating ang mga salita';

$fullName = $firstName . ' ' . $lastName; //concat is dot .  or cancat for string  String Concatenation


"Hello my name is $fullName"; //double quote String Interpolation

$first_Name = 'Mark Jacob'; // Snake Case 

//PHP = Loosely Typed Language   AUTOMATIC DATA TYPE 

//Implicit Type Casting / Juggling 

$num1 = 5;
$num2 = 20;
$num3 = '10';
$prutas = 'Mango';


echo '<br />';
$result = (string) $num2;
var_dump($result);

//Variables of PHP

//String Int float Boolen Array Object Null  

//Arithmetic Operators
// - + * / % **

//Assignment Operators
// = += -= *= /= %= **=

//Math Functions
// abs() round() ceil() floor() sqrt() pow() max() min() rand() mt_rand()

//ceil is the highest value and floor is the lowest value for round up or round down

// THIS IS AN ARRAY FOR  STRING JUST REMOVE THE QUOTES FOR THE INTERGER ETCCC..
$Name = ['Mark Jacob', 'Capague'];



// ARRAY always start with 0
$names = array(1, 2, 3);
$name = [1, 2, 3];

// Assiociative Array            Record = Related Laman


// Fat Arrow Syntax
// Key Value Pairs

//name is the key and Reiniel is the value
$student = [
    "name" => "Mark Jacob",
    "age" => 20,
    "email" => "jacobcapague11@gmail.com"
];

//Calling an Key Value Pairs Using Value 
echo $student['email'];



//multi dimensional array 

/*$student = [
    [
        "name" => "Mark Jacob",
        "age" => 20,
        "email" => "jacobcapague11@gmail.com"
    ],

    ["name"] => "Capague",
    "age" => 20,
    "email" => "jacobcapague11@gmail.com"

]
*/

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title><?= $title ?></title>
</head>

<body class="bg-gray-100">

    <header class="bg-blue-500 text-white p-4">
        <div class="container mx-auto">
            <h1 class="text-3xl font-semibold">WS03</h1>
        </div>
    </header>

    <div class="container mx-auto p-4 mt-4">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-semibold mb-4"><?= $fullName ?></h2>
            <p><?= $body ?></p>

        </div>
    </div>

</body>

</html>