<?php
    session_start();
    include_once("dbcon.php");
    $userid = $_POST['uid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $user = $_POST['user'];
    $pass = $_POST['password'];
    $obs = $_POST['obs'];
    $ownuser = $_SESSION['user'];

    $sql = "INSERT INTO accounts (userid, name, email, user, pass, obs, ownuser) VALUES";
    $sql .= "('$userid','$name', '$email', '$user', '$pass', '$obs', '$ownuser')";
    if (mysqli_query($conn, $sql)) {
        echo 
        "<script>
            alert('Conta adicionada com Sucesso');
            window.location = ('menu.php');
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);

?>