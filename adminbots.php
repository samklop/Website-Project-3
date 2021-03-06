<?php
// Initialize the session
session_start();
if ($_SESSION["admin"] == 0)
{
    header("Location: index.php");
}
$config = require_once('config.php');
$conn = mysqli_connect($config['host'], $config['user'], $config['password'], $config['name']);
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
    require_once('navbar.php');
    ?>
   <div class="flex justify-center">
        <a href="adminteams.php" class="nav-button">Overview</a>
        <a href="adminscores.php" class="nav-button">Scores</a>
        <a href="adminbots.php" class="nav-button">Battlebots</a>
        <a href="adminallusers.php" class="nav-button">All Users</a>
    </div>

    <div class="flex justify-center font-medium">
        <div class="flex-col w-96 m-5 p-4 bg-gray-600 rounded">
            <div class="flex w-full justify-center mb-4">
                <h2 class="font-medium text-lg self-center truncate">Team A</h2>
            </div>
            <div class="flex w-full justify-left">
                <h3 class="font-medium text-base self-center truncate">Bot Name:
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='A'");
                    while ($row = mysqli_fetch_array($result)) {
                        $name = $row['bot_name'];
                        echo $name;
                    }
                    ?>
                </h3>
            </div>
            <div class="flex w-full justify-left">
                <h3>Edit bot name
                    <?php
                    if (isset($_POST['submitBotA'])) {
                        $newNameA = $_POST['newNameA'];
                        $sql = "UPDATE robots SET bot_name='$newNameA' WHERE team='A'";

                        $stmt = mysqli_prepare($conn, $sql)
                            or die(mysqli_error($conn));

                        mysqli_stmt_execute($stmt)
                            or die(mysqli_error($conn));

                        mysqli_stmt_close($stmt);
                    }
                    ?>
                    <form name="setBotA" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="text" id="newNameA" name="newNameA">
                        <input type="submit" name="submitBotA" value="Edit bot name" class="editName">
                    </form>
                </h3>
            </div>
        </div>
    </div>

    <div class="flex justify-center font-medium">
        <div class="flex-col w-96 m-5 p-4 bg-gray-600 rounded">
            <div class="flex w-full justify-center mb-4">
                <h2 class="font-medium text-lg self-center truncate">Team B</h2>
            </div>
            <div class="flex w-full justify-left">
                <h3 class="font-medium text-base self-center truncate">Bot Name:
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='B'");
                    while ($row = mysqli_fetch_array($result)) {
                        $name = $row['bot_name'];
                        echo $name;
                    }
                    ?>
                </h3>
            </div>
            <div class="flex w-full justify-left">
                <h3>Edit bot name
                    <?php
                    if (isset($_POST['submitBotB'])) {
                        $newNameB = $_POST['newNameB'];
                        $sql = "UPDATE robots SET bot_name='$newNameB' WHERE team='B'";

                        $stmt = mysqli_prepare($conn, $sql)
                            or die(mysqli_error($conn));

                        mysqli_stmt_execute($stmt)
                            or die(mysqli_error($conn));

                        mysqli_stmt_close($stmt);
                    }
                    ?>
                    <form name="setBotB" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="text" id="newNameB" name="newNameB">
                        <input type="submit" name="submitBotB" value="Edit bot name" class="editName">
                    </form>
                </h3>
            </div>
        </div>
    </div>

    <div class="flex justify-center font-medium">
        <div class="flex-col w-96 m-5 p-4 bg-gray-600 rounded">
            <div class="flex w-full justify-center mb-4">
                <h2 class="font-medium text-lg self-center truncate">Team C</h2>
            </div>
            <div class="flex w-full justify-left">
                <h3 class="font-medium text-base self-center truncate">Bot Name:
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='C'");
                    while ($row = mysqli_fetch_array($result)) {
                        $name = $row['bot_name'];
                        echo $name;
                    }
                    ?>
                </h3>
            </div>
            <div class="flex w-full justify-left">
                <h3>Edit bot name
                    <?php
                    if (isset($_POST['submitBotC'])) {
                        $newNameC = $_POST['newNameC'];
                        $sql = "UPDATE robots SET bot_name='$newNameC' WHERE team='C'";

                        $stmt = mysqli_prepare($conn, $sql)
                            or die(mysqli_error($conn));

                        mysqli_stmt_execute($stmt)
                            or die(mysqli_error($conn));

                        mysqli_stmt_close($stmt);
                    }
                    ?>
                    <form name="setBotC" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="text" id="newNameC" name="newNameC">
                        <input type="submit" name="submitBotC" value="Edit bot name" class="editName">
                    </form>
                </h3>
            </div>
        </div>
    </div>

    <div class="flex justify-center font-medium">
        <div class="flex-col w-96 m-5 p-4 bg-gray-600 rounded">
            <div class="flex w-full justify-center mb-4">
                <h2 class="font-medium text-lg self-center truncate">Team D</h2>
            </div>
            <div class="flex w-full justify-left">
                <h3 class="font-medium text-base self-center truncate">Bot Name:
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='D'");
                    while ($row = mysqli_fetch_array($result)) {
                        $name = $row['bot_name'];
                        echo $name;
                    }
                    ?>
                </h3>
            </div>
            <div class="flex w-full justify-left">
                <h3>Edit bot name
                    <?php
                    if (isset($_POST['submitBotD'])) {
                        $newNameD = $_POST['newNameD'];
                        $sql = "UPDATE robots SET bot_name='$newNameD' WHERE team='D'";

                        $stmt = mysqli_prepare($conn, $sql)
                            or die(mysqli_error($conn));

                        mysqli_stmt_execute($stmt)
                            or die(mysqli_error($conn));

                        mysqli_stmt_close($stmt);
                    }
                    ?>
                    <form name="setBotD" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="text" id="newNameD" name="newNameD">
                        <input type="submit" name="submitBotD" value="Edit bot name" class="editName">
                    </form>
                </h3>
            </div>
        </div>
    </div>

    <div class="flex justify-center font-medium">
        <div class="flex-col w-96 m-5 p-4 bg-gray-600 rounded">
            <div class="flex w-full justify-center mb-4">
                <h2 class="font-medium text-lg self-center truncate">Team E</h2>
            </div>
            <div class="flex w-full justify-left">
                <h3 class="font-medium text-base self-center truncate">Bot Name:
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='E'");
                    while ($row = mysqli_fetch_array($result)) {
                        $name = $row['bot_name'];
                        echo $name;
                    }
                    ?>
                </h3>
            </div>
            <div class="flex w-full justify-left">
                <h3>Edit bot name
                    <?php
                    if (isset($_POST['submitBotE'])) {
                        $newNameE = $_POST['newNameE'];
                        $sql = "UPDATE robots SET bot_name='$newNameE' WHERE team='E'";

                        $stmt = mysqli_prepare($conn, $sql)
                            or die(mysqli_error($conn));

                        mysqli_stmt_execute($stmt)
                            or die(mysqli_error($conn));

                        mysqli_stmt_close($stmt);
                    }
                    ?>
                    <form name="setBotE" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="text" id="newNameE" name="newNameE">
                        <input type="submit" name="submitBotE" value="Edit bot name" class="editName">
                    </form>
                </h3>
            </div>
        </div>
    </div>
</body>

</html>

<?php
mysqli_close($conn);
?>
