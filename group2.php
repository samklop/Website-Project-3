<?php
// Initialize the session
session_start();

$config = require_once('config.php');
$conn = mysqli_connect($config['host'], $config['user'], $config['password'], $config['name']);
?>

<!doctype html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link href="groupB.css" rel="stylesheet" type="text/css">
</head>

<body class="text-white bg">

    </div>
    <video class="video" src="media/groupB.mp4" muted loop autoplay></video>
    <?php
    require_once('navbar.php');
    ?>
    <h1 class="text-center text-4xl m-5">Project Battlebot - Group B</h1>

    <div class="flex flex-col flex-grow wrapper">
        <div class="flex flex-wrap upperHalf justify-between h-2-4">
            <div class="flex flex-col border-b-4 border-l-4 border-r-4 border-solid border-gray-600 bg-gray-400 w-px-500 m-5 transparent">
                <h2 class="bg-gray-600 p-2">Scoreboard</h2>
                <div class="flex flex-grow px-3 items-center p-1">Relay Race:
                    <?php
                    $result = mysqli_query($conn, "SELECT *FROM robots WHERE team='B'");
                    while ($row = mysqli_fetch_array($result)) {
                        $score1B = $row['game1_score'];
                        echo $score1B;
                    }
                    ?>
                </div>
                <div class="flex flex-grow  px-3 items-center p-1">Tic-Tac-Toe:
                    <?php
                    $result = mysqli_query($conn, "SELECT *FROM robots WHERE team='B'");
                    while ($row = mysqli_fetch_array($result)) {
                        $score2B = $row['game2_score'];
                        echo $score2B;
                    }
                    ?>
                </div>
                <div class="flex flex-grow  px-3 items-center p-1">Shape Draw:
                    <?php
                    $result = mysqli_query($conn, "SELECT *FROM robots WHERE team='B'");
                    while ($row = mysqli_fetch_array($result)) {
                        $score3B = $row['game3_score'];
                        echo $score3B;
                    }
                    ?>
                </div>
                <div class="flex flex-grow  px-3 items-center p-1">Maze:
                    <?php
                    $result = mysqli_query($conn, "SELECT *FROM robots WHERE team='B'");
                    while ($row = mysqli_fetch_array($result)) {
                        $score3B = $row['game4_score'];
                        echo $score3B;
                    }
                    ?>
                </div>

            </div>
            <div class="flex bg-gray-600 w-px-500 m-5">

                <?php
                require_once('navbar.php');
                ?>


                <iframe src="http://foscam.serverict.nl/videostream.cgi" title="Robolympics" width="480" height="480"></iframe>


                <?php
                // gets all data from camera control table for the request list
                if ($conn === false) {
                    die("ERROR could not connect to database " . mysqli_connect_error());
                }
                if ($stmt = $conn->prepare("SELECT * FROM camera_control ORDER BY requested_time ASC")) {
                    $stmt->execute();

                    $results = $stmt->get_result();
                } else {
                    echo "could not execute";
                }
                ?>

            </div>
            <div class="flex flex-wrap lowerHalf justify-between h-2-4">
                <form action=<?php echo $_SERVER['PHP_SELF'] ?> method="get">
                    <div class="flex flex-wrap p-4 justify-center">
                        <div class="flex flex-col  my-1 mx-3 p-4 justify-center">
                            <div class="icons" id="relay"></div>
                            <p class="my-2 text-center"><b>Relay</b></p>
                            <button type="submit" name="Race" class="rounded-full text-white px-6 py-2 yellow" value="race">Start</button>
                        </div>
                        <div class="flex flex-col my-1 mx-3 p-4 justify-center">
                            <div class="icons" id="tictactoe"></div>
                            <p class="my-2 text-center"><b>Tic-Tac-Toe</b></p>
                            <button type="submit" name="Tiktaktoe" class="rounded-full text-white px-6 py-2 yellow" value="tiktactoe">Start</button>
                        </div>
                        <div class="flex flex-col  my-1 mx-3 p-4 justify-center">
                            <div class="icons" id="shapeDraw"></div>
                            <p class="my-2 text-center"><b>Shape Draw</b></p>
                            <button type="submit" name="ShapeRedraw" class="-600 rounded-full text-white px-6 py-2 yellow" value="shaperedraw">Start</button>
                        </div>
                        <div class="flex flex-col  my-1 mx-3 p-4 justify-center">
                            <div class="icons" id="maze"></div>
                            <p class="my-2 text-center"><b>Maze</b></p>
                            <button type="submit" name="Maze" class="rounded-full text-white px-6 py-2 yellow" value="maze">Start</button>
                        </div>
                    </div>

                </form>
                <form action=<?php echo $_SERVER['PHP_SELF'] ?> method="get">
                    <div class="flex justify-center flex-col control">
                        <input type="submit" name="forward" class="bg-gray-600 p-2 rounded" value="Forward">
                        <input type="submit" name="left" class="bg-gray-600 p-2 rounded" value="Left">
                        <input type="submit" name="right" class="bg-gray-600 p-2 rounded" value="Right">
                        <input type="submit" name="backward" class="bg-gray-600 p-2 rounded" value="Backward">
                        <input type="submit" name="stopMotor" class="bg-gray-600 p-2 rounded" value="Stop Motor">

                    </div>
                </form>
                <!--        this enables the sound :D although it has no value anywhere-->
                <form action="" method="post">

                    <br>
                    <br>
                    <input type=submit class="sound_btn"name="s" value="Enable sound">
                </form>

                <div id="myProgress">
                    <div id="myBar">0%</div>
                </div>

                <!--            sound sources-->
                <audio id="start">
                    <source src="sound/Acceleration.mp3" type="audio/mpeg">
                </audio>
                <audio id="speed1">
                    <source src="sound/SpeedDrifting.mp3" type="audio/mpeg">
                </audio>
                <audio id="speed2">
                    <source src="sound/Speed2.mp3" type="audio/mpeg">
                </audio>
                <audio id="speed3">
                    <source src="sound/Speed3.mp3" type="audio/mpeg">
                </audio>
                <audio id="speed4">
                    <source src="sound/Speed4.mp3" type="audio/mpeg">
                </audio>

                <?php




                //  require_once('navbar.php');
                //making connection with the API 



                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.samklop.xyz/bots",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_POSTFIELDS => "",

                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);
                echo "<pre>";
                echo "</pre>";
                $data = json_decode($response, true);
                //getting data for robot 2 (B)
                foreach ($data as $bots) {
                    if (is_array($bots)) {
                        $sped = $bots[1][2]["data"];
                        $sound = $bots[1][2]["data"];
                        // checking if its int data
                        if (is_numeric($sped) && is_numeric($sound)) {
                            $sped = $bots[1][2]["data"];
                            $sound = $bots[1][2]["data"];
                            $_SESSION['Speed2'] = $sped;
                        } else {
                            $sped = $_SESSION['Speed2'];
                            $sound = $_SESSION['Speed2'];
                        }
                    }
                }
                // test if the functions work with those 2 values
                // comment them afterwards
                      //$sped = 40;
                      //$sound = 80;


                ?>

                <script>
                    var i = 0;

                    //            // the battery starts again if it hits 0
                    //            if (sessionStorage.getItem("timer") <= 1)
                    //            {
                    //                sessionStorage.setItem("timer", "100");
                    //            }
                    if (i == 0) {
                        i = 1;
                        // variables for the sound
                        var Start = document.getElementById("start");
                        var Speed1 = document.getElementById("speed1");
                        var Speed2 = document.getElementById("speed2");
                        var Speed3 = document.getElementById("speed3");
                        var Speed4 = document.getElementById("speed4");
                        // functions for sound
                        function playAudioStart() {
                            Start.play();
                        }

                        function playAudioSpeed1() {
                            Speed1.play();
                        }

                        function playAudioSpeed2() {
                            Speed2.play();
                        }

                        function playAudioSpeed3() {
                            Speed3.play();
                        }

                        function playAudioSpeed4() {
                            Speed4.play();
                        }

                        // THIS FUNCTION IS THE BATTERY FEATURE
                        // THIS FUNCTION DOES NOT WORK PROPERLY

                        //                var timer2 = localStorage.getItem("seconds");
                        //                var timer = parseInt(timer2);
                        //
                        //                function Taimer() {
                        //                    // this is the time removal for the battery
                        //                    timer = timer - 1;
                        //                    var x = localStorage.getItem("timer");;
                        //                    x.toString();
                        //                    sessionStorage.setItem("timer", x)
                        //                    document.getElementById("myBar1").innerHTML = timer + "%";
                        //                    document.getElementById("myBar1").style.width = timer + "%";
                        //
                        //                }
                        //
                        //                Taimer();
                        //                var time = setInterval(Taimer, 5000);

                        //this changes the speed bar up/down
                        var elem = document.getElementById("myBar");
                        var id = setInterval(myFunction, 20);
                        var sound = "<?php echo ($sound); ?>";
                        sound.toString();
                        sessionStorage.setItem("sound", sound);

                        function myFunction() {
                            if (sound >= sound2) {
                                // it goes up
                                sound2++;
                                elem.style.width = sound2 + "%";
                                elem.innerHTML = sound2 + "%";

                            } else {
                                // goes down
                                document.getElementById("myBar").innerHTML = sound + "%";
                                document.getElementById("myBar").style.width = sound + "%";
                            }
                            var sound2 = sound;
                            sound2.toString();
                            sessionStorage.setItem("sound2", sound2)

                        }

                    }




                    // reloads the page every 10 seconds
                    var timeout = setTimeout("location.reload(true);", 10000);

                    //updates the div for music
                    function AudioReload() {
                        $("#here").load(window.location.href + " #here");
                    }

                    var Audio = setInterval(AudioReload, 3000);
                </script>
                <div id="here">
                    <?php
                    // the music conditions



                    if ($sped <= 10) {
                        echo "<script> playAudioStart(); </script>";
                    } else if ($sped > 10 && $sped < 20) {
                        echo "<script> playAudioSpeed1(); </script>";
                    } else if ($sped >= 20 && $sped <= 40) {
                        echo "<script> playAudioSpeed2(); </script>";
                    } else if ($sped > 40 && $sped <= 70) {
                        echo "<script> playAudioSpeed3(); </script>";
                    } else if ($sped > 70 && $sped <= 100) {
                        echo "<script> playAudioSpeed4(); </script>";
                    }

                    ?>

                </div>

                <?php

                if (isset($_GET["backward"])) {
                    $command = $_GET["backward"];
                    //The url you wish to send the POST request to (change url)
                    $url = "https://api.samklop.xyz/settask";
                    //The data you want to send via POST look at manual of api
                    $data = array('id' => '2', 'task' => $command);
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

                if (isset($_GET["stopMotor"])) {
                    $command = $_GET["stopMotor"];
                    //The url you wish to send the POST request to (change url)
                    $url = "https://api.samklop.xyz/settask";
                    //The data you want to send via POST look at manual of api
                    $data = array('id' => '2', 'task' => $command);
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

                if (isset($_GET["right"])) {
                    $command = $_GET["right"];
                    //The url you wish to send the POST request to (change url)
                    $url = "https://api.samklop.xyz/settask";
                    //The data you want to send via POST look at manual of api
                    $data = array('id' => '2', 'task' => $command);
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

                if (isset($_GET["left"])) {
                    $command = $_GET["left"];
                    //The url you wish to send the POST request to (change url)
                    $url = "https://api.samklop.xyz/settask";
                    //The data you want to send via POST look at manual of api
                    $data = array('id' => '2', 'task' => $command);
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

                if (isset($_GET["forward"])) {
                    $command = $_GET["forward"];
                    //The url you wish to send the POST request to (change url)
                    $url = "https://api.samklop.xyz/settask";
                    //The data you want to send via POST look at manual of api
                    $data = array('id' => '2', 'task' => $command);
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

                if (isset($_GET["Race"])) {
                    $command = $_GET["Race"];
                    //The url you wish to send the POST request to (change url)
                    $url = "https://api.samklop.xyz/settask";
                    //The data you want to send via POST look at manual of api
                    $data = array('id' => '2', 'task' => $command);
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
                if (isset($_GET["Tiktaktoe"])) {
                    $command = $_GET["Tiktaktoe"];
                    //The url you wish to send the POST request to (change url)
                    $url = "https://api.samklop.xyz/settask";
                    //The data you want to send via POST look at manual of api
                    $data = array('id' => '2', 'task' => $command);
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
                if (isset($_GET["ShapeRedraw"])) {
                    $command = $_GET["ShapeRedraw"];
                    //The url you wish to send the POST request to (change url)
                    $url = "https://api.samklop.xyz/settask";
                    //The data you want to send via POST look at manual of api
                    $data = array('id' => '2', 'task' => $command);
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
                if (isset($_GET["Maze"])) {
                    $command = $_GET["Maze"];
                    //The url you wish to send the POST request to (change url)
                    $url = "https://api.samklop.xyz/settask";
                    //The data you want to send via POST look at manual of api
                    $data = array('id' => '2', 'task' => $command);
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


</body>

</html>