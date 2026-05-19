<?php

$daysOftheWeek = date('l');


switch ($daysOftheWeek) {
    case 'Monday':
        $message = 'Monday Blues';
        $color = 'blue';
        break;

    case 'Tuesday':
        $message = 'Tuesday day';
        $color = 'green';
        break;

    case 'Wednesday':
        $message = 'Wednesday Hump Day';
        $color = 'yellow';
        break;

    case 'Thursday':
        $message = 'Thursday Walang pasok';
        $color = 'purple';
        break;

    case 'Friday':
        $message = 'Friday Nights';
        $color = 'red';
        break;

    case 'Saturday':
        $message = 'Saturday Pahinga';
        $color = 'orange';
        break;

    case 'Sunday':
        $message = 'Sunday Funday';
        $color = 'pink';
        break;
}






?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>What Day Is It?</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: blue;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>

<body style="background-color: <?= $color ?>;">
    <h1><?= $message ?></h1>
</body>

</html>