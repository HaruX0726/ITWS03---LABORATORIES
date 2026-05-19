<?php

$result = "";

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    if (isset($_FILES['myfile']) && $_FILES['myfile']['error'] === 0) {
        $result = "File Name: " . $_FILES['myfile']['name'] . "<br>";
        $result .= "File Type: " . $_FILES['myfile']['type'] . "<br>";
        $result .= "File Size: " . $_FILES['myfile']['size'] . " bytes";
    }
} else {
    $result = "No File Selected or Error in Uploading";
}





?>

<!DOCTYPE html>
<html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>FILES Demo</title>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-96">
        <h1 class="text-2xl font-bold mb-4">$_FILES Demo</h1>

        <!-- enctype is REQUIRED for file uploads -->
        <form method="POST" enctype="multipart/form-data" class="space-y-4">
            <input type="file" name="myfile" class="w-full" />

            <button class="bg-purple-600 text-white w-full py-2 rounded-lg">
                Upload
            </button>
        </form>
        <!-- php below -->


        <?php if ($result !== "") : ?>
            <p class="mt-4 text-purple-700 font-semibold"><?= $result ?></p>

        <?php endif; ?>

    </div>
</body>

</html>