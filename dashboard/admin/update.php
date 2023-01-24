<?php

include("../../connection.php");
session_start();
$user_id = $_SESSION['user_id'];
$nama_lengkap = $_SESSION['nama_lengkap'];
$role = $_SESSION['role'];
$status = $_SESSION['status'];

//get id
$user_id = $_GET['user_id'];

//query data user berdasarkan id
$data = query("SELECT * FROM users WHERE user_id=$user_id")[0];

//validasi
if ($status != "login") {
    header("location:../../index.php?message=silahkan login terlebih dahulu!");
}

if ($role != "admin") {
    header("location:../index.php?message= ❌ maaf anda bukan admin ❌");
}

//apakah tombol submit sudah ditekan atau belum
if (isset($_POST['update'])) {

    //cek apakah data berhasil diubah atau tidak
    if (update($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil diupdate');
        document.location.href = 'data-user.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal diupdate');
        document.location.href = 'data-user.php';
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php
include("../header.php")
?>

<body>
    <h1>Edit Data User</h1>
    <div class="container">
        <form action="" method="POST">
            <div class="row">
                <div class="col-sm-12">
                    <input type="hidden" name="id" value="<?= $data["id"] ?>">

                    <label for="user_id">ID</label>
                    <input type="text" name="user_id" id="user_id" required class="form-control form-control" value="<?= $data["user_id"] ?>">

                    <label for="nama_lengkap">Nama</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" required class="form-control form-control" value="<?= $data["nama_lengkap"] ?>">

                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" required class="form-control form-control" value="<?= $data["password"] ?>">

                    <label for="role">Role</label>
                    <input type="text" name="role" id="role" required class="form-control form-control" value="<?= $data["role"] ?>">

                </div>
                <div class="col-sm-12" align="center">
                    <br />
                    <button type="sumbit" name="update" class="btn btn-primary">Simpan</button>
                    <a href="data-user.php">kembali</a>
                </div>


            </div>
        </form>
    </div>
</body>

</html>