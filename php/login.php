<?php

include_once("dbconn.php");

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
            <form id="login" action="index.php" method="post" class="input-group">
                <input type="text" class="input-field" placeholder="Username" required />
                <input type="text" class="input-field" placeholder="Password" required />
                <button type="submit" class="submit-btn">Log In</button>
            </form>
            <form id="register" action="index.php" method="post" class="input-group">
                <input type="text" class="input-field" placeholder="Username" required />
                <input type="text" class="input-field" placeholder="Gmail" required />
                <input type="text" class="input-field" placeholder="Password" required />
                <button type="submit" class="submit-btn">Register</button>
            </form>
        </div>
    </div>
    <script src="../js/login.js?v=<?php echo time(); ?>"></script>
</body>

</html>