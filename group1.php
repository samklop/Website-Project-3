<?php
session_start();
$_SESSION['botID'] = "1";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/styles.css" rel="stylesheet" type="text/css">
</head>

<body class="min-h-full bg-gray-800 text-white">
    <?php
    if (isset($_GET["backward"]) && isset($_SESSION['botID']))
    {
        $command = $_GET["backward"];
        //The url you wish to send the POST request to (change url)
        $url = "https://api.samklop.xyz/settask";
        //The data you want to send via POST look at manual of api
        $data = array('id' => $_SESSION['botID'], 'task' => $command);
        //url-ify the data for the POST
        $data_string = http_build_query($data);
        //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //execute post
        $result = curl_exec($ch);
        $info = curl_getinfo($ch);
    }

    if (isset($_GET["stopMotor"]) && isset($_SESSION['botID']))
    {
        $command = $_GET["stopMotor"];
        //The url you wish to send the POST request to (change url)
        $url = "https://api.samklop.xyz/settask";
        //The data you want to send via POST look at manual of api
        $data = array('id' => $_SESSION['botID'], 'task' => $command);
        //url-ify the data for the POST
        $data_string = http_build_query($data);
        //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //execute post
        $result = curl_exec($ch);
        $info = curl_getinfo($ch);
    }

    if (isset($_GET["right"]) && isset($_SESSION['botID']))
    {
        $command = $_GET["right"];
        //The url you wish to send the POST request to (change url)
        $url = "https://api.samklop.xyz/settask";
        //The data you want to send via POST look at manual of api
        $data = array('id' => $_SESSION['botID'], 'task' => $command);
        //url-ify the data for the POST
        $data_string = http_build_query($data);
        //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //execute post
        $result = curl_exec($ch);
        $info = curl_getinfo($ch);
    }

    if (isset($_GET["left"]) && isset($_SESSION['botID']))
    {
        $command = $_GET["left"];
        //The url you wish to send the POST request to (change url)
        $url = "https://api.samklop.xyz/settask";
        //The data you want to send via POST look at manual of api
        $data = array('id' => $_SESSION['botID'], 'task' => $command);
        //url-ify the data for the POST
        $data_string = http_build_query($data);
        //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //execute post
        $result = curl_exec($ch);
        $info = curl_getinfo($ch);
    }

    if (isset($_GET["forward"]) && isset($_SESSION['botID']))
    {
        $command = $_GET["forward"];
        //The url you wish to send the POST request to (change url)
        $url = "https://api.samklop.xyz/settask";
        //The data you want to send via POST look at manual of api
        $data = array('id' => $_SESSION['botID'], 'task' => $command);
        //url-ify the data for the POST
        $data_string = http_build_query($data);
        //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //execute post
        $result = curl_exec($ch);
        $info = curl_getinfo($ch);
    }

    require_once('navbar.php');
    if (isset($_GET["command"]) && isset($_SESSION['botID']))
    {
        $command = $_GET["command"];
        //The url you wish to send the POST request to (change url)
        $url = "https://api.samklop.xyz/settask";
        //The data you want to send via POST look at manual of api
        $data = array('id' => $_SESSION['botID'], 'task' => $command);
        //url-ify the data for the POST
        $data_string = http_build_query($data);
        //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //execute post
        $result = curl_exec($ch);
        $info = curl_getinfo($ch);
    }
    ?>
    <div class="flex justify-center m-5">
        <div class="flex justify-center flex-col">
            <div class="bg-gray-600 p-2 rounded">
                <img src="inc/arduino.jpg" alt="Livestream">
            </div>
            <form class="bg-gray-600 p-2 rounded m-2 text-center">
                <select name="command" class="bg-gray-800 p-2 rounded">
                    <?php
                    $the_key = "race"; // or whatever you want
                    if (isset($_GET["command"]))
                        $the_key = $command;

                    foreach (["Race", "TikTacToe", "Maze", "ShapeRedraw", "Idle"] as $val) : ?>
                        <option value="<?= strtolower($val) ?>" <?= (strtolower($val) === $the_key) ? 'selected="selected"' : ''; ?>>
                            <?= $val ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" class="bg-gray-800 p-2 rounded" value="Send command">

                <div class="flex justify-center flex-row">
                    <input type="submit" name="forward" class="bg-gray-600 p-2 rounded" value="Forward">
                    <input type="submit" name="left" class="bg-gray-600 p-2 rounded" value="Left">
                    <input type="submit" name="right" class="bg-gray-600 p-2 rounded" value="Right">
                    <input type="submit" name="backward" class="bg-gray-600 p-2 rounded" value="Backward">
                    <input type="submit" name="stopMotor" class="bg-gray-600 p-2 rounded" value="Stop Motor">
                </div>
            </form>
        </div>
        <div class="border-solid border-8 border-gray-600 p-2 m-2 rounded max-w-xs">
            <h2 class="text-2xl font-bold">Technoking of Battlebots</h2>
            <p>It just works. - Todd Howard</p>
            <div>
                <img src="inc/speaker.png" alt="Mute Button" onclick="sound()">
            </div>
        </div>
    </div>
    <script>
        var audio = new Audio('sound/speaker-test-sample.wav');

        function sound() {
            if (audio.paused) {
                audio.play();
                audio.loop = true;
            } else {
                audio.pause();
            }
        }
    </script>
</body>

</html>