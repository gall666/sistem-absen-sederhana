<?php

include("../../connection.php");

$user_id = $_GET['user_id'];


if (hapus($user_id) > 0) {
    echo "
        <script>
        alert('data berhasil dihapus');
        document.location.href = 'data-user.php';
        </script>
        ";
} else {
    echo "
    <script>
        alert('data gagal dihapus');
        document.location.href = 'data-user.php';
        </script>
        ";
}
