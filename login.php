<?php

include("connection.php");
include("users_class.php");

$user = new Users();

if (isset($_POST['login'])) {
    $user->set_login_data($_POST['user_id'], $_POST['password']);

    $user_id = $user->get_user_id();
    $password = $user->get_password();

    $sql = "SELECT * FROM users WHERE user_id=$user_id AND password='$password'";

    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        // echo "login berhasil";
        while ($data = $result->fetch_assoc()) {
            session_start();
            $_SESSION['user_id'] = $data['user_id'];
            $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
            $_SESSION['password'] = $data['password'];
            $_SESSION['role'] = $data['role'];
            $_SESSION['status'] = "login";

            if ($data['role'] == "admin") {
                header("location:dashboard/index-admin.php?message=Selamat datang admin");
            } else {
                header("location:dashboard/index.php?message=Selamat Datang Di Sistem Absensi Sederhana");
            }
        }
    } else {
        header("location:index.php?message=silahkan input data yang benar 😁");
    }
}
