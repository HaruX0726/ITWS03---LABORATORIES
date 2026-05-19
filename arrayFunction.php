<?php
date_default_timezone_set('America/New_York');


$output = Null;

$ids = [10, 22, 15, 67, 45];
$users = ['user1', 'user2', 'user3'];

$output = count($ids); //counts all elements in an array
rsort($ids); //sorts an array in descending order
array_push($ids, 100); //adds one or more elements to the end of an array
array_pop($ids); //removes the last element of an array
array_shift($ids); //removes the first element of an array
array_unshift($ids, 67); //adds one or more elements to the beginning of an array
$ids2 = array_slice($ids, 2, 3); // array_slice() extracts a portion of an array

array_splice($ids, 1, 1, 'new user'); // array_splice() removes and replaces elements in an array
$output = 'Sum of array Ids: ' . array_sum($ids); // array_sum() calculates the sum of values in an array

$output = "User 2 is at index: " . array_search('user2', $users); // array_search() searches for a value in an array and returns its key/index
$output = "User 3 Exist: " . in_array('user3', $users);  // in_array() checks if a value exists in an array


$tags = 'saleslady, collector, callcenter,pulis ';
$tagArray = explode(',', $tags);






//Array Functions
// count(), sort(), rsort(), array_push(), array_pop(),  


//Iteration 
// Looping 


//For Loop
/*
for ($i = 0; $i < count($ids); $i++) {
    //echo $ids[i] . '<br />';
}
*/

//While Loop

/*
 while (condition) {
    // code...
 }
 */

//do while 
/*
 do {
    // code...
 } while (condition);
 */

// most used loop in php is foreach loop and fpr loop
//Foreach Loop

/*
foreach (array as subarray) {
    //echo $tag . '<br />';
}

*/

$output = date('F/d/Y h:i:s A')

/*var_dump($tagArray);
var_dump($ids2);
*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Array Functions</title>
</head>

<body class="bg-gray-100">

    <header class="bg-blue-500 text-white p-4">
        <div class="container mx-auto">
            <h1 class="text-3xl font-semibold">PHP</h1>
        </div>
    </header>

    <div class="container mx-auto p-4 mt-4">
        <div class="bg-white rounded-lg shadow-md p-6 mt-6">

            <!-- Output -->
            <p class="text-xl"><?= $output ?></p>

            <h2 class="text-xl font-semibold my-4">IDs Array</h2>

            <p><?php print_r($users); ?></p>

        </div>
    </div>

</body>

</html>