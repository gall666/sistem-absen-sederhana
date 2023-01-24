<?php

include("../../connection.php");
session_start();
$user_id = $_SESSION['user_id'];
$nama_lengkap = $_SESSION['nama_lengkap'];
$role = $_SESSION['role'];
$status = $_SESSION['status'];

//get id
$id = $_GET['id'];

//query data user berdasarkan id
$data = query("SELECT * FROM dayoff JOIN users ON dayoff.user_id = users.user_id WHERE dayoff.id=$id")[0];

//validasi
if ($status != "login") {
    header("location:../../index.php?message=silahkan login terlebih dahulu!");
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("location:../../index.php?message=terimakasih sudah berkunjung");
}

if ($role != "admin") {
    header("location:../index.php?message= ❌ maaf anda bukan admin ya guys❌");
}

//apakah tombol submit sudah ditekan atau belum
if (isset($_POST['approv'])) {

    //cek apakah data berhasil diubah atau tidak
    if (approv($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil diupdate');
        document.location.href = 'dayoff-user.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal diupdate');
        document.location.href = 'dayoff-user.php';
        </script>
        ";
    }
}

if (isset($_POST['reject'])) {

    //cek apakah data berhasil diubah atau tidak
    if (reject($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil diupdate');
        document.location.href = 'dayoff-user.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal diupdate');
        document.location.href = 'dayoff-user.php';
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php
include("../header.php");
include("navbar.php");
?>

<h1>Detail Pengajuan</h1>

<div class="container">
    <div class="col-sm-12">
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <input type="hidden" name="id" value="<?= $_data["status"] ?>">
            <div class="form-group">
                <label for="user_id">User Id</label>
                <input type="text" name="user_id" id="user_id" class="form-control" value="<?= $data["user_id"] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nama_lengkap">Nama</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="<?= $data["nama_lengkap"] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <input type="text" name="role" id="role" class="form-control" value="<?= $data["role"] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="start_date">Mulai Libur</label>
                <input type="text" name="start_date" id="start_date" class="form-control" value="<?= $data["start_date"] ?>" readonly>

            </div>
            <div class="form-group">
                <label for="end_date">Mulai Masuk</label>
                <input type="text" name="end_date" id="end_date" class="form-control" value="<?= $data["end_date"] ?>" readonly>

            </div>
            <div class="form-group">
                <label for="purpose">Alasan</label>
                <input type="text" name="purpose" id="purpose" class="form-control" value="<?= $data["purpose"] ?>" readonly>

            </div>
            <div align="center">
                <button type="sumbit" name="approv" class="btn btn-success">Approv</button>
                <button type="sumbit" name="reject" class="btn btn-danger">Reject</button>
            </div>

        </form>
    </div>
</div>
</body>

</html>