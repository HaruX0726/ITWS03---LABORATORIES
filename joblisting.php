<?php

$listings = [
    [
        'id' => 1,
        'title' => 'Software Engineer',
        'description' => 'We are seeking a skilled Software Engineer to develop high quality software solutions.',
        'salary' => '80000',
        'location' => 'San Francisco',
        'tags' => ['Java', 'Python', 'PHP'],
    ],
    [
        'id' => 2,
        'title' => 'Web Developer',
        'description' => 'Looking for a talented Web Developer to create and maintain our company website.',
        'salary' => '60000',
        'location' => 'New York',
        'tags' => ['HTML', 'CSS', 'JavaScript', 'PHP'],
    ],
    [
        'id' => 3,
        'title' => 'Data Analyst',
        'description' => 'Seeking a Data Analyst to interpret complex data sets and provide insights to drive business decisions.',
        'salary' => '70000',
        'location' => 'Chicago',
        'tags' => [],
    ],
    [
        'id' => 4,
        'title' => 'Project Manager',
        'description' => 'We need an experienced Project Manager to oversee projects from initiation to completion.',
        'salary' => '90000',
        'location' => 'Los Angeles',
        'tags' => ['Leadership', 'Communication', 'Agile'],
    ],
    [
        'id' => 5,
        'title' => 'Graphic Designer',
        'description' => 'Looking for a creative Graphic Designer to create visual concepts that inspire and captivate consumers.',
        'salary' => '55000',
        'location' => 'Miami',
        'tags' => ['Adobe Photoshop', 'Illustrator', 'Creativity'],
    ],
];




//Ternary OPerator 


// null coalescing operator
// ?? checks if the variable is null



function sayHello($name, $age)
{
    echo "Hello , $name, ! You are $age years old.";
}



sayHello("Jacob", 20);

function add($a, $b)
{

    return $a + $b;
}

$result = add(5, 10);

echo $result;



$y = 10;

//Scope of varible 
function testing()
{
    global $y;
}

//Global is Considered as a Bad Code

testing();


// Splat Operator ... 


function sum(...$numbers)
{

    return array_sum($numbers);
}
echo "<br>";
echo sum(1, 2, 3, 4, 5,);


//constant cannot be change or const, 
//during runtime
// rules for constant = UPPERCASE, No $sign and Global Scope
// define ()

define("SITE_NAME", "CICT");
echo "<br>";
echo SITE_NAME;

//const is local scope 
//compile time 
const TAX_RATE = 0.12;
echo "<br>";
echo TAX_RATE;




//helper function 

function formatSalary($salary) {}

$formatSalary = fn($salary) => '$' . number_format($salary, 2);


//arrow function 
//anonymous function

$adds = function ($a, $b) {
    return $a + $b;
};

$adds = fn($ab, $b) => $a + $b;

$hello = function () {
    echo "Hello";
};

echo "<br>";
$hello();

//callback


function run($greet)
{

    $greet();
}

echo "<br>";
run($hello);

// use 
$Kaibigan = "Kawaki072126";
$Kumusta = function () use ($Kaibigan) {
    echo "Kumusta ka  $Kaibigan";
};

echo "<br>";
$Kumusta();

// main function pag may name, anonymous pag wala, pag shortcut arrow function naman 
// helper = Arrow fn
// Name function = more code 

// oop 

function filterByLocation($listings, $location)
{
    return array_filter($listings, function ($job) use ($location) {
        return strcasecmp($job['location'], $location) === 0;
    });
}
if (isset($_GET['location'])) {
    $location = $_GET['location'];
    $listings = filterByLocation($listings, $location);
} else {
    $filteredLocation = $listings;
}



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Job Listings</title>
</head>

<body class="bg-gray-100">
    <header class="bg-blue-500 text-white p-4">
        <div class="container mx-auto">
            <h1 class="text-3xl font-semibold">Job Listings</h1>
        </div>
    </header>
    <div class="container mx-auto p-4 mt-4">

        <?php foreach ($listings as $index => $job) : ?>
            <div class="my-4">
                <div class="<?php if ($index % 2 === 0) : ?>
                    bg-blue-300
                    <?php else : ?>
                    bg-white 
                    <?php endif; ?> 
                    rounded-lg shadow-md">


                    <div class="p-4">
                        <h2 class="text-xl font-semibold"><?= $job['title']; ?></h2>
                        <p class="text-gray-700 text-lg mt-2"><?= $job['description']; ?></p>
                        <ul class="mt-4">
                            <li class="mb-2">
                                <strong>Salary:</strong> <?= formatSalary($job['salary']); ?>
                            </li>
                            <li class="mb-2">
                                <strong>Location:</strong> <?= $job['location']; ?>
                                <?php if ($job['location'] === 'New York') : ?>
                                    <span class="text-xs text-black bg-blue-100 rounded-full px-2 py-1 ml-2"> Remote</span>
                                <?php endif; ?>

                                <?= $job['location'] === 'New York' ? '<span class="text-xs text-black bg-teal-300 rounded-full px-2 py-1 ml-2"> On Site</span>' : ''; ?>
                            </li>

                            <li class="mb-2">
                                <?php if (!empty($job['tags'])): ?>
                                    <strong>Tags:</strong> <?= implode(', ', $job['tags']); ?>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>


    </div>
</body>

</html>