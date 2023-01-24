<?php
session_start();
$user_id = $_SESSION['user_id'];
$nama_lengkap = $_SESSION['nama_lengkap'];
// $password = $_SESSION['password'];
$role = $_SESSION['role'];
$status = $_SESSION['status'];

if ($status != "login") {
    header("location:../index.php?message=silahkan login terlebih dahulu!");
}
if ($role === "admin") {
    header("location:index-admin.php?message=silahkan masuk dengan akun user!");
}
if (isset($_POST['logout'])) {
    session_destroy();
    header("location:../index.php?message=terimakasih sudah berkunjung");
}
?>

<!DOCTYPE html>
<html lang="en">

<?php
include("header.php");
include("navbar.php");

?>
<div class="col">
    <br>
    <h3>Dashboard</h3>
</div>

<div class="container">
    <div align="center">
        <p>
            <?php
            if (isset($_GET['message'])) {
                echo $_GET['message'];
            }
            ?>
        </p>
        <i>Halo <?= $nama_lengkap ?></i>
        <p>Status kepegawaian: <?= $role ?></p>
    </div>
    <br />
    <br />
    <!-- Show attendance data -->
    <?php include("absensi.php"); ?>

</div>
</body>

</html>