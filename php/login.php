<?php

session_start();

if (isset($_SESSION['USERNAME']) &&  isset($_SESSION['PASSWORD'])) {
    header('location: home.php');
}
include_once("dbconn.php");

$username = $_POST["USERNAME"];
$pswd = $_POST["PASSWORD"];
$password = md5($pswd);
$gmail = $_POST["GMAIL"];

$select = "SELECT * FROM `accounts` WHERE `user_username`='$username' AND `user_gmail` = '$gmail' ";



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
            <?php
            if (isset($_POST["REGISTER-BTN"])) {
                $result = mysqli_query($conn, $select);
                if (mysqli_num_rows($result) > 0) {
                    echo "<script>alert('Account Already Registered')</script>";
                } else {
                    mysqli_query($conn, "INSERT INTO accounts (user_username, user_gmail, user_password) VALUES  ('$username', '$gmail', '$password')");
                    header("location: login.php");
                }
            }

            if (isset($_POST["LOGIN-BTN"])) {
                $results = mysqli_query($conn, "SELECT * FROM `accounts` WHERE `user_username`='$username' AND `user_password` = '$password'");
                if (mysqli_num_rows($results) > 0) {
                    header("location: home.php");
                } else {
                    echo "<script>alert('Invalid Account')</script>";
                }
            }

            ?>
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


<?php

session_destroy();

?>