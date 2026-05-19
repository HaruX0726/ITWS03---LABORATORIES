<?php

abstract class Account
{
    protected $username;
    protected $plan;

    public function __construct($username, $plan)
    {
        $this->username = $username;
        $this->plan = $plan;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPlan()
    {
        return $this->plan;
    }

    abstract public function Plan();
}

class Premium extends Account
{
    public function Plan()
    {
        return "Premium Plan";
    }
}

class Free extends Account
{
    public function Plan()
    {
        return "Free Plan";
    }
}

interface Playable
{
    public function play();
    public function pause();
}

class Song implements Playable
{
    public function play()
    {
        return "Now Playing: 'Midnight Rain'Taylor Swift.";
    }

    public function pause()
    {
        return "Paused: 'Imahe'Magnus Haven.";
    }
}

$outputMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInput = $_POST['username'];
    $planInput = $_POST['plan'];
    $action = $_POST['action'];

    if ($planInput == "Premium") {
        $userAccount = new Premium($userInput, $planInput);
    } else {
        $userAccount = new Free($userInput, $planInput);
    }

    $song = new Song();
    $name = $userAccount->getUsername();

    ob_start();

    echo "<div class='mt-6 p-4 border border-gray-600 rounded-lg bg-transparent text-gray-300'>";

    if ($action == 'play') {
        echo "<h3 class='text-lg font-bold text-white flex items-center gap-2'>▶ Playing</h3>";
        echo "<p class='text-sm mt-2 font-mono text-[15px]'>";
        echo "<span class='font-bold text-green-400'>[{$name}]</span> " . $song->play();

        // Add the ads if they are on Free
        if ($planInput == "Free") {
            echo " <span class='text-yellow-500 italic ml-2'>[AD] Upgrade to Premium! [AD]</span>";
        }
        echo "</p>";
    } elseif ($action == 'pause') {
        echo "<h3 class='text-lg font-bold text-white flex items-center gap-2'>⏸ Paused</h3>";
        echo "<p class='text-sm mt-2 font-mono text-[15px]'>";
        echo "<span class='font-bold text-gray-400'>[{$name}]</span> " . $song->pause();

        // Add the pause ads if they are on Free
        if ($planInput == "Free") {
            echo " <span class='text-yellow-500 italic ml-2'>Ads will resume shortly.</span>";
        }
        echo "</p>";
    }

    echo "</div>";

    $outputMessage = ob_get_clean();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Spotify</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#111827] text-white min-h-screen flex items-center justify-center p-4 font-sans">

    <div class="bg-[#1f2937] p-8 rounded-xl shadow-2xl w-full max-w-md border border-gray-700">

        <h2 class="text-3xl font-extrabold text-green-500 mb-6 text-center tracking-tight">Mini-Spotify</h2>

        <form method="POST" action="" class="space-y-4">

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Username:</label>
                <input type="text" name="username" required placeholder="Enter your name"
                    class="w-full px-4 py-2 bg-[#374151] border border-green-500 rounded-md text-gray-300 focus:outline-none focus:ring-1 focus:ring-green-500 transition">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Select Plan:</label>
                <select name="plan"
                    class="w-full px-4 py-2 bg-[#374151] border border-gray-600 rounded-md text-white focus:outline-none focus:ring-1 focus:ring-green-500 transition">
                    <option value="Free">Free Account</option>
                    <option value="Premium">Premium Account</option>
                </select>
            </div>

            <div class="flex gap-4 mt-6">
                <button type="submit" name="action" value="play"
                    class="w-1/2 bg-[#22c55e] hover:bg-green-400 text-[#111827] font-bold py-3 px-4 rounded-full transition duration-200">
                    ▶ Play
                </button>
                <button type="submit" name="action" value="pause"
                    class="w-1/2 bg-transparent border border-gray-500 hover:border-gray-400 text-white font-bold py-3 px-4 rounded-full transition duration-200">
                    ⏸ Pause
                </button>
            </div>
        </form>

        <?php
        if ($outputMessage != "") {
            echo $outputMessage;
        }
        ?>

    </div>

</body>

</html>