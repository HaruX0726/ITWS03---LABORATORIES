<?php
// SUPERGLOBALS LAB
// Fill in the blanks using ONLY these:
// $_SERVER, $_GET, $_POST, $_FILES, $_SESSION

session_start(); // needed for $_SESSION

// SERVER: request method
$requestMethod = $_SERVER['REQUEST_METHOD']; // GET or POST

// GET or POST: theme from URL or form 
$theme = $_GET['theme'] ?? ($_POST['theme'] ?? 'light');

// Theme classes
$bodyClass = "bg-yellow-300 text-slate-900";
$cardClass = "bg-pink-200 border-slate-200";
$mutedText = "text-slate-600";
$softBg    = "bg-green-400";

if ($theme === "dark") {
    $bodyClass = "bg-cyan-400 text-slate-100";
    $cardClass = "bg-gray-800 border-slate-600";
    $mutedText = "text-mist-800";
    $softBg    = "bg-gray-900";
}

// Default outputs
$notice = "";
$uploadedInfo = "";

// POST + FILES handling
if ($requestMethod === "POST") {

    // POST: read name
    $name = $_POST['student_name'] ?? "";

    // SESSION: remember name
    $_SESSION['student_name'] = $name;

    // FILES: safe check first
    if (isset($_FILES['student_file']) && $_FILES['student_file']['error'] === 0) {

        $fileName = $_FILES['student_file']['name'];
        $fileSize = $_FILES['student_file']['size'];

        $uploadedInfo = "Uploaded file: $fileName ($fileSize bytes)";
    } else {
        $uploadedInfo = "No file selected (or upload error).";
    }

    $notice = "Saved! Refresh the page and your SESSION name should stay.";
}

// SESSION: read remembered value
$savedName = $_SESSION['student_name'] ?? "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Superglobals Lab</title>
</head>

<body class="<?= $bodyClass; ?> min-h-screen p-6">
    <div class="max-w-3xl mx-auto">
        <div class="<?= $cardClass; ?> border rounded-2xl shadow p-6">

            <h1 class="text-2xl font-bold">Superglobals Lab (Student)</h1>
            <p class="mt-1 <?= $mutedText; ?>">
                FORM → $_SERVER → $_GET → $_POST → $_FILES → $_SESSION
            </p>

            <?php if ($notice !== ""): ?>
                <div class="mt-4 <?= $softBg; ?> border <?= ($theme === "dark" ? "border-slate-700" : "border-slate-200"); ?> rounded-xl p-4">
                    <p class="font-semibold"><?= $notice; ?></p>
                </div>
            <?php endif; ?>

            <div class="grid md:grid-cols-2 gap-4 mt-6">

                <!-- SERVER -->
                <div class="<?= $softBg; ?> border <?= ($theme === "dark" ? "border-slate-700" : "border-slate-200"); ?> rounded-xl p-4">
                    <h2 class="font-bold text-lg">$_SERVER</h2>
                    <p class="mt-2 text-sm <?= $mutedText; ?>">Shows the request method.</p>
                    <p class="mt-3 font-mono">REQUEST_METHOD: <?= $requestMethod; ?></p>
                </div>

                <!-- GET -->
                <div class="<?= $softBg; ?> border <?= ($theme === "dark" ? "border-slate-700" : "border-slate-200"); ?> rounded-xl p-4">
                    <h2 class="font-bold text-lg">$_GET</h2>
                    <p class="mt-2 text-sm <?= $mutedText; ?>">Reads data from the URL.</p>
                    <p class="mt-3 font-mono">theme: <?= $theme; ?></p>

                    <div class="mt-3 flex gap-2">
                        <a class="px-3 py-2 rounded-lg <?= ($theme === "dark" ? "bg-lime-700" : "bg-lime-200"); ?>" href="?theme=light">Light</a>
                        <a class="px-3 py-2 rounded-lg <?= ($theme === "dark" ? "bg-lime-700" : "bg-lime-200"); ?>" href="?theme=dark">Dark</a>
                    </div>
                </div>

                <!-- POST + FILES -->
                <div class="<?= $softBg; ?> border <?= ($theme === "dark" ? "border-slate-700" : "border-slate-200"); ?> rounded-xl p-4">
                    <h2 class="font-bold text-lg">FORM → $_POST + $_FILES</h2>
                    <p class="mt-2 text-sm <?= $mutedText; ?>">
                        Submit a name (POST) and choose a file (FILES).
                    </p>

                    <form method="POST" enctype="multipart/form-data" class="mt-4 space-y-3">

                        <!-- Keep theme during POST -->
                        <input type="hidden" name="theme" value="<?= $theme; ?>">

                        <input type="text"
                            name="student_name"
                            placeholder="Enter your name"
                            class="w-full rounded-xl border px-4 py-2 <?= ($theme === "dark" ? "bg-slate-800 border-slate-700" : "bg-white border-slate-200"); ?>" />

                        <input type="file" name="student_file" class="w-full text-sm" />

                        <button class="w-full rounded-xl px-4 py-2 font-semibold <?= ($theme === "dark" ? "bg-lime-700 text-white" : "bg-lime-200  text-black"); ?>">
                            Save (POST)
                        </button>
                    </form>

                    <?php if ($uploadedInfo !== ""): ?>
                        <p class="mt-3 text-sm font-mono"><?= $uploadedInfo; ?></p>
                    <?php endif; ?>

                </div>

                <!-- SESSION -->
                <div class="<?= $softBg; ?> border <?= ($theme === "dark" ? "border-slate-700" : "border-slate-200"); ?> rounded-xl p-4">
                    <h2 class="font-bold text-lg">$_SESSION</h2>
                    <p class="mt-2 text-sm <?= $mutedText; ?>">
                        Remembers data even after refresh.
                    </p>

                    <p class="mt-3">
                        <span class="font-semibold">Saved Name:</span>
                        <span class="font-mono"><?= $savedName; ?></span>
                    </p>
                </div>

            </div>
        </div>
    </div>
</body>

</html>