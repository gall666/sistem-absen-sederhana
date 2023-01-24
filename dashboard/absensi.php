<table class="table table-bordered">
    <tr>
        <th>Tanggal</th>
        <th>Clock In</th>
        <th>Clock Out</th>
        <th>Performa</th>
    </tr>

    <?php

    include("../connection.php");

    date_default_timezone_set("Asia/Jakarta");

    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM absensi WHERE user_id='$user_id'";
    $result = $db->query($sql);
    $tgl = date('Y-m-d');
    $time = date('H:i:s');

    if (isset($_POST['clockout'])) {
        $sql = "UPDATE absensi SET jam_keluar='$time' WHERE user_id='$user_id' AND tgl='$tgl'";

        $clockout = $db->query($sql);
        if ($clockout === TRUE) {
            session_start();
            session_destroy();
            header("location:../index.php?message=terimakasih!");
        } else {
            echo "maaf terjadi kesalahan";
        }
    }

    while ($data = $result->fetch_assoc()) {
        echo "<tr class='tr'>";
        echo "<td class='td'> " . $data['tgl'] . " </td>";
        echo "<td class='td'> " . $data['jam_masuk'] . " </td>";
        //table jam keluar
        if (empty($data['jam_keluar']) && !empty($data['jam_masuk']) && $data['tgl'] == $tgl) {
            echo "<td>
      <form action='' method='POST'>
        <button name='clockout' type='submit' class=" . "btn-primary" . ">Clock Out</button>
      </form>
      </td>";
        } else if (empty($data['jam_keluar']) && !empty($data['jam_masuk'])) {
            echo "<td>
            <form action='' method='POST'>
                <button name='approve' type='submit' class=" . "btn-warning" . ">Request</button>
            </form>
            </td>";
        } else {
            echo "<td > " . $data['jam_keluar'] . " </td>";
        }
        //table performa
        if (!empty($data['jam_masuk']) && !empty($data['jam_keluar'])) {
            echo "<td>👍</td>";
        } else {
            echo "<td>❌</td>";
        }
        echo "</tr>";
    }
    ?>
</table>

<form action="action.php" method="POST">
    <button name="absen" type="submit" class="btn btn-primary">Clock In</button>
</form>