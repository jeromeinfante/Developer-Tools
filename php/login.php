<?php

include("errors.php");
include_once("dbconn.php");

$error = "";

$username = $_POST["USERNAME"];
$pswd = $_POST["PASSWORD"];
$password = md5($pswd);
$gmail = $_POST["GMAIL"];

$select = "SELECT * FROM `accounts` WHERE `user_username`='$username' AND `user_gmail` = '$gmail' ";

if (isset($_POST["REGISTER-BTN"])) {
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) > 0) {
        $error = $account_already_registered;
    } elseif (empty($_POST['USERNAME'])) {
        $error = $username_required;
    } elseif (!filter_var($_POST['GMAIL'], FILTER_VALIDATE_EMAIL)) {
        $error = $gmail_required;
    } elseif (strlen($_POST['PASSWORD'] < 8)) {
        $error = $password_8;
    } elseif (!preg_match("/[a-z]/i", $_POST['PASSWORD'])) {
        $error = $password_letter;
    } elseif (!preg_match("/[0-9]/", $_POST['PASSWORD'])) {
        $error = $password_number;
    } else {
        mysqli_query($conn, "INSERT INTO accounts (user_username, user_gmail, user_password) VALUES  ('$username', '$gmail', '$password')");
        header('location: login.php');
        exit;
    }
}

$resultshaha = mysqli_fetch_assoc($select);


if (isset($_POST["LOGIN-BTN"])) {
    $user = mysqli_fetch_assoc($result);
    $results = mysqli_query($conn, "SELECT * FROM `accounts` WHERE `user_username`='$username' AND `user_password` = '$password'");
    if (mysqli_num_rows($results) > 0) {
        session_start();
        $_SESSION["user_id"] = $user["id"];
        header("location: home.php");
        exit;
    } else {
        echo "<script>alert('Invalid Account')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Library</title>
    <link rel="stylesheet" href="../css/login.css?v=<?php echo time(); ?>" />
</head>

<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" id="login-btn">
                    Login
                </button>
                <button type="button" class="toggle-btn" id="register-btn">
                    Register
                </button>
            </div>
            <?php echo "<p> $error </p>" ?>
            <form id="login" action="login.php" method="post" class="input-group">
                <input type="text" class="input-field" placeholder="Username" required name="USERNAME" />
                <input type="password" class="input-field" placeholder="Password" required name="PASSWORD" />
                <button type="submit" class="submit-btn" name="LOGIN-BTN">Log In</button>
            </form>
            <form id="register" action="login.php" method="post" class="input-group">
                <input type="text" class="input-field" placeholder="Username" required name="USERNAME" />
                <input type="text" class="input-field" placeholder="Gmail" required name="GMAIL" />
                <input type="password" class="input-field" placeholder="Password" required name="PASSWORD" />
                <button type="submit" class="submit-btn" name="REGISTER-BTN">Register</button>
            </form>
        </div>
    </div>
    <script src="../js/login.js?v=<?php echo time(); ?>"></script>
</body>

</html>