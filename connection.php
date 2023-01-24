<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "db_absen";

$db = new mysqli($hostname, $username, $password, $db_name);

if ($db->connect_error) {
    echo "connection failed!";
}

//tambah function
function tambah($data)
{
    //ambil data dari tiap elemen
    $user_id = htmlspecialchars($_POST['user_id']);
    $password = htmlspecialchars($_POST['password']);
    $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
    $role = htmlspecialchars($_POST['role']);

    //query insert data
    global $db;
    $query = "INSERT INTO users VALUES ('', '$user_id', '$password', '$nama_lengkap', '$role')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $datas = [];

    //mysqli_fetch_row() // mengembalikan array numeric
    //mysqli_fetch_assoc() // mengembalikan array associative // nama field
    //mysqli_fetch_array() // mengembalikan numeric dan assoc
    //mysqli_fetch_object() // menegembalikan object // pemanggilan $exm ->namaField

    while ($data = mysqli_fetch_assoc($result)) {
        $datas[] = $data;
    }

    return $datas;
}

//hapus function
function hapus($user_id)
{
    global $db;
    mysqli_query($db, "DELETE FROM users WHERE user_id=$user_id");

    return mysqli_affected_rows($db);
}

//edit function
function update($data)
{

    //ambil data dari tiap elemen
    $id = $data['id'];
    $user_id = htmlspecialchars($_POST['user_id']);
    $password = htmlspecialchars($_POST['password']);
    $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
    $role = htmlspecialchars($_POST['role']);

    //query update data
    global $db;
    $query = "UPDATE users SET user_id = $user_id, password = '$password', nama_lengkap = '$nama_lengkap', role = '$role' WHERE id = $id ";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//dayoff function
function dayoff($data)
{
    //ambil data dari tiap elemen
    $user_id = $_SESSION['user_id'];
    $start_date = htmlspecialchars($_POST['start_date']);
    $end_date = htmlspecialchars($_POST['end_date']);
    $purpose = htmlspecialchars($_POST['purpose']);

    //query insert data
    global $db;
    $query = "INSERT INTO dayoff VALUES ('', $user_id, '$start_date', '$end_date', '$purpose', 'Pending')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//DETAIL FUNCTION
//approved
function approv($data)
{
    //ambil data dari tiap elemen
    $id = $_GET['id'];

    //query update data
    global $db;
    $query = "UPDATE dayoff SET status = 'Approved' WHERE id = $id";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
//Rejected
function reject($data)
{
    //ambil data dari tiap elemen
    $id = $_GET['id'];

    //query update data
    global $db;
    $query = "UPDATE dayoff SET status = 'Rejected' WHERE id = $id";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function dateDifference($date1, $date2)
{
    $date = strtotime($date1) - strtotime($date2);
    $sec_per_day = 24 * 60 * 60; //86400
    return abs(round($date / $sec_per_day));
}
