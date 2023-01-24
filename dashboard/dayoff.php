<?php

include("../connection.php");
session_start();
$user_id = $_SESSION['user_id'];
$nama_lengkap = $_SESSION['nama_lengkap'];
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

if (isset($_POST['simpan'])) {

    //cek apakah data berhasil ditambahkan atau tidak
    if (dayoff($_POST) > 0) {
        echo "
        <script>
        alert('form libur berhasil dikirim');
        document.location.href = 'dayoff.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('form libur gagal dikirim');
        document.location.href = 'dayoff.php';
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<?php
include("header.php");
include("navbar.php");

?>

<body>
    <div class="container">
        <br />
        <h3 align="center">Form Pengajuan Libur</h3>
        <br />
        <form action="" method="POST">
            <div class="row">
                <div class="col-sm-12">
                    <label for="start_date"><strong>Start Date</strong></label>
                    <input type="text" name="start_date" id="start_date" required class="form-control form-control" placeholder="Start Date">

                    <label for="end_date"><strong>End Date</strong></label>

                    <input type="text" name="end_date" id="end_date" required class="form-control form-control" placeholder="End Date">

                    <label for="purpose"><strong>Purpose</strong></label></td>
                    <input type="text" name="purpose" id="purpose" required class="form-control form-control" placeholder="Purpose">
                </div>
                <div class="col-sm-12" align="center">
                    <br>
                    <button type="sumbit" name="simpan" class="btn btn-primary">Submit</button>
                </div>
            </div>

            <br>
            <br>
            <br>
            <br>

            <h3 align="center">History pengajuan libur</h3>
            <br />

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>User ID</th>
                        <th>Nama</th>
                        <th>Role</th>
                        <th>Dari</th>
                        <th>Sampai</th>
                        <th>Purpose</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM dayoff JOIN users ON users.user_id = dayoff.user_id WHERE dayoff.user_id = '$user_id'";
                    $result = $db->query($sql);
                    $no = 1;

                    foreach ($result as $data) :
                        echo "<tr class='tr'>";
                        echo "<td class='td'>" . $no++ . "</td>";
                        echo "<td class='td'>" . $data['user_id'] . "</td>";
                        echo "<td class='td'>" . $data['nama_lengkap'] . "</td>";
                        echo "<td class='td'>" . $data['role'] . "</td>";
                        echo "<td class='td'>" . $data['start_date'] . "</td>";
                        echo "<td class='td'>" . $data['end_date'] . "</td>";
                        echo "<td class='td'>" . $data['purpose'] . "</td>";
                        if ($data['status'] === "Approved") {
                            echo "<td class=" . "table-success" . ">" . $data['status'] . "</td>";
                        } else if ($data['status'] === "Rejected") {
                            echo "<td class=" . "table-danger" . ">" . $data['status'] . "</td>";
                        } else {
                            echo "<td class=" . "table-warning" . ">" . $data['status'] . "</td>";
                        }
                        echo "</tr>";
                    endforeach;
                    ?>
                </tbody>
            </table>
        </form>
    </div>
</body>

</html>