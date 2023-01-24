<!DOCTYPE html>
<html lang="en">
<?php
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

include("../header.php");
?>


<body>
    <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="./admin/data-user.php">Data User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./admin/dayoff-user.php">Libur User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <h1>
            <?php if (isset($_GET['message'])) {
                echo $_GET['message'];
            } ?>
        </h1>
        <a href="../index-admin.php">Kembali</a>
        <br />
        <br />
        <a href="tambah.php" class="btn btn-primary">Tambah Data User</a>
        <br>
        <br>
        <table class="table table-bordered table-hover">
            <tr class="tr">
                <th class="th">No.</th>
                <th class="th">ID</th>
                <th class="th">Password</th>
                <th class="th">Nama</th>
                <th class="th">Jabatan</th>
                <th class="th" colspan="2">Aksi</th>
            </tr>

            <?php
            include("../../connection.php");
            $user = query("SELECT * FROM users");

            $no = 1;

            foreach ($user as $data) :
                echo "<tr class='tr'>";
                echo "<td class='td'>" . $no++ . "</td>";
                echo "<td class='td'>" . $data['user_id'] . "</td>";
                echo "<td class='td'>" . $data['password'] . "</td>";
                echo "<td class='td'>" . $data['nama_lengkap'] . "</td>";
                echo "<td class='td'>" . $data['role'] . "</td>";

                echo "<td class='td'>" . '<a href="hapus.php?user_id=' . $data['user_id'] . '" class="btn btn-warning">hapus</a>' . "</td>";
                echo "<td class='td'>" . '<a href="update.php?user_id=' . $data['user_id'] . '" class="btn btn-success">update</a>' . "</td>";

                echo "</tr>";
            endforeach;
            ?>
        </table>
    </div>
    <div style="display: flex; justify-content:center;align-items:center; margin-top: 20px;">
        <button class="btn btn-primary" style="text-align:center" onclick="window.print()">CETAK LAPORAN</button>
    </div>
    <div style="display: flex; justify-content:center;align-items:center; margin-top: 20px;">

    </div>

</body>

</html>