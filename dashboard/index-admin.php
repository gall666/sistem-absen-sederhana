<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$user_id = $_SESSION['user_id'];
$nama_lengkap = $_SESSION['nama_lengkap'];
$role = $_SESSION['role'];
$status = $_SESSION['status'];

if ($status != "login") {
    header("location:../index.php?message=silahkan login terlebih dahulu!");
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("location:../index.php?message=terimakasih sudah berkunjung");
}

if ($role != "admin") {
    header("location:index.php?message= ❌ maaf anda bukan admin ya guys❌");
}

include("header.php");
include("navbar-admin.php");
?>

<div class="container">
    <h1>
        <?php if (isset($_GET['message'])) {
            echo $_GET['message'];
        } ?>
    </h1>

    <form action="" method="POST">
        <div class="table-responsive">
            <table class="table table-bordered table-sm">
                <tr class="tr">
                    <th class="th">No.</th>
                    <th class="th">Nama</th>
                    <th class="th">Jabatan</th>
                    <th class="th">Tanggal</th>
                    <th class="th">Clock in</th>
                    <th class="th">Clockout</th>
                    <th class="th">Performa</th>
                    <th class="th">Aksi</th>
                </tr>

                <?php
                include("../connection.php");

                $user_id = $_SESSION['user_id'];

                $sql = "SELECT * FROM users JOIN absensi ON users.user_id = absensi.user_id";

                $result = $db->query($sql);


                $no = 1;
                while ($data = $result->fetch_assoc()) {
                    echo "<tr class='tr'>";
                    echo "<td class='td'>" . $no++ . "</td>";
                    "<td class='td'>" . '<input type="hidden" value=' . $data['user_id'] . '">' . "</td>";
                    echo "<td class='td'>" . $data['nama_lengkap'] . "</td>";
                    echo "<td class='td'>" . $data['role'] . "</td>";
                    echo "<td class='td'>" . $data['tgl'] . "</td>";
                    echo "<td class='td'>" . $data['jam_masuk'] . "</td>";
                    echo "<td class='td'>" . $data['jam_keluar'] . "</td>";

                    if (!empty($data['jam_masuk']) && !empty($data['jam_keluar'])) {
                        echo "<td class='td'> 👍 </td>";
                    } else {
                        echo "<td class='td'> ❌ </td>";
                    }

                    echo "<td class='td'>" . '<a href="view.php?id=' . $data['user_id'] . '">view</a>' . "</td>";


                    echo "</tr>";
                }
                ?>
            </table>
            <div style="display: flex; justify-content:center;align-items:center; margin-top: 20px;">
                <form action="" method="POST">
                    <button type="submit" name="logout" class="btn btn-primary">logout</button>
                </form>
            </div>
        </div>

    </form>
</div>
<div style="display: flex; justify-content:center;align-items:center; margin-top: 20px;">
    <a href="cetak.php" target="_blank">CETAK</a>
</div>


</body>

</html>