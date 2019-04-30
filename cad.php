<?php
    session_start();
    include('dbcon.php');
    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $user = mysqli_real_escape_string($conn, trim($_POST['user']));
    $pass = mysqli_real_escape_string($conn, trim(md5($_POST['pass'])));

    $sql = "SELECT count(*) as total from users WHERE user = '$user'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    if($row['total'] == 1){
        $_SESSION['user_exists'] = true;
	    header('Location: register.php');
	    exit;
    }

    $sql = "INSERT INTO users (name, user, pwd, date_cad) VALUES ('$name', '$user', '$pass', NOW())";
    
    if($conn->query($sql) === TRUE) {
        $_SESSION['stats_cad'] = true;
    }
    
    $conn->close();
    
    header('Location: register.php');
    exit;
?>