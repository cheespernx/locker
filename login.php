<?php 
session_start();
include('dbcon.php');

if(empty($_POST['user']) || empty($_POST['pass'])) {
    header('Location: index.php');
    exit();
}

$user = mysqli_real_escape_string($conn, $_POST['user']);
$pass = mysqli_real_escape_string($conn, $_POST['pass']);

$query = "SELECT user FROM users WHERE user = '{$user}' and pwd = md5('{$pass}')";

$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result);

$row2 = mysqli_fetch_assoc($result);
$name1 = $row2['name'];


if($row == 1){
    $_SESSION['name'] = $name1;
    $_SESSION['user'] = $user;
    header('Location: menu.php');
    exit();
} else {
    $_SESSION['not-auth'] = true;
    header('Location: index.php');
    exit();
}
?>