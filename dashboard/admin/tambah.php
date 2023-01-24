<?php

include("../../connection.php");
session_start();
$user_id = $_SESSION['user_id'];
$nama_lengkap = $_SESSION['nama_lengkap'];
$role = $_SESSION['role'];
$status = $_SESSION['status'];

if ($status != "login") {
    header("location:../../index.php?message=silahkan login terlebih dahulu!");
}

if ($role != "admin") {
    header("location:../index.php?message= ❌ maaf anda bukan admin ❌");
}

if (isset($_POST['simpan'])) {

    //cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil ditambahkan');
        document.location.href = 'data-user.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal ditambahkan');
        document.location.href = 'data-user.php';
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tambah Data User</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
    <div class="container-md mt-3">
        <h1>Tambah Data User</h1>
        <form action="" method="POST">
            <table class="table table-borderless">
                <ul class="list-group">
                    <tr>
                        <th>
                            <li class="list-group-item">
                                <label for="user_id">User Id</label>
                            </li>
                        </th>
                        <td>
                            <li class="list-group-item">
                                <input type="text" name="user_id" id="user_id" required>
                            </li>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <li class="list-group-item">
                                <label for="nama_lengkap">Nama</label>
                            </li>
                        </th>
                        <td>
                            <li class="list-group-item">
                                <input type="text" name="nama_lengkap" id="nama_lengkap" required>
                            </li>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <li class="list-group-item">
                                <label for="password">Password</label>
                            </li>
                        </th>
                        <td>
                            <li class="list-group-item">
                                <input type="text" name="password" id="password" required>
                            </li>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <li class="list-group-item">
                                <label for="role">Role</label>
                            </li>
                        </th>
                        <td>
                            <li class="list-group-item">
                                <input type="text" name="role" id="role" required>
                            </li>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <li class="list-group-item">
                                <label for="password">Password</label>
                            </li>
                        </th>
                        <td>
                            <li class="list-group-item">
                                <input type="text" name="role" id="role" required>
                            </li>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <li class="list-group-item">
                                <label for="role">Role</label>
                            </li>
                        </th>
                        <td>
                            <li class="list-group-item">
                                <input type="text" name="role" id="role" required>
                            </li>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <li class="list-group-item">
                                <a href="data-user.php" class="btn btn-primary">kembali</a>
                            </li>
                        </th>
                        <th>
                            <li class="list-group-item">
                                <button type="sumbit" name="simpan" class="btn btn-info">Simpan</button>
                            </li>
                        </th>

                    </tr>
                    <tr>

                    </tr>
                </ul>
            </table>
        </form>
    </div>
</body>

</html>