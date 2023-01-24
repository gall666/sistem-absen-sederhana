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

if (isset($_POST['logout'])) {
    session_destroy();
    header("location:../../index.php?message=terimakasih sudah berkunjung");
}

if ($role != "admin") {
    header("location:../index.php?message= ❌ maaf anda bukan admin ya guys❌");
}

include("../header.php");
include("navbar.php");
?>

<h1>Pengajuan Libur User</h1>
<div class="container">
    <br>
    <div class="row">
        <table class="table table-bordered table-sm">
            <tr>
                <th>No</th>
                <th>User ID</th>
                <th>Nama</th>
                <th>Role</th>
                <th>Lama</th>
                <th>Status</th>
                <th colspan="2">Aksi</th>
            </tr>

            <?php
            include("../../connection.php");
            $sql = "SELECT * FROM users JOIN dayoff ON users.user_id = dayoff.user_id";
            $result = $db->query($sql);
            $no = 1;

            while ($data = $result->fetch_assoc()) {
                echo "<tr class='tr'>";
                echo "<td class='td'>" . $no++ . "</td>";
                echo "<td class='td'>" . $data['user_id'] . "</td>";
                echo "<td class='td'>" . $data['nama_lengkap'] . "</td>";
                echo "<td class='td'>" . $data['role'] . "</td>";
                $diff = dateDifference($data['end_date'], $data['start_date']);
                echo "<td class='td'>" .  $diff . ' Hari' . "</td>";
                if ($data['status'] === "Approved") {
                    echo "<td class=" . "table-success" . ">" . $data['status'] . "</td>";
                } else if ($data['status'] === "Rejected") {
                    echo "<td class=" . "table-danger" . ">" . $data['status'] . "</td>";
                } else {
                    echo "<td class=" . "table-warning" . ">" . $data['status'] . "</td>";
                }
                echo "<td class='td'>" . '<a href="detail.php?id=' . $data['id'] . '" class="btn btn-primary">Detail</a>' . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</div>
</body>

</html>