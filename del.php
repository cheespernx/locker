<?php
    session_start();
    include_once("dbcon.php");
    $id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);
    $sql_del = "DELETE FROM accounts WHERE id = '$id'";
    $result_del = mysqli_query($conn, $sql_del);
    if(mysqli_affected_rows($conn)){
        header('Location: list-accounts.php');;
    }
?>