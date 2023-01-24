<?php

session_start();

if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
    header("location:dashboard/index.php?message=selamat datang kembali!");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style.css">
    <title>ABSENSI PAGE</title>
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <form action="login.php" method="POST" class="login-form">
                <h2 class="login-title">Login System</h2>
                <?php
                if (isset($_GET['message'])) {
                    echo $_GET['message'];
                }
                ?>
                <input name="user_id" type="text" class="login-input" placeholder="User ID" />
                <input name="password" type="password" class="login-input" placeholder="Password" />
                <button type="submit" name="login" class="login-button">MASUK</button>
            </form>
        </div>
    </div>
</body>

</html>