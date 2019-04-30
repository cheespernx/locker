<?php
	include_once("dbcon.php");
	$id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
	$user = mysqli_real_escape_string($conn, $_POST['user']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $obs = mysqli_real_escape_string($conn, $_POST['obs']);
	

	$sql = "UPDATE accounts SET name = '$name', email = '$email', user =  '$user', pass = '$pass', obs = '$obs' WHERE id = '$id'";
	
	$result_sql = mysqli_query($conn, $sql);
	if (mysqli_query($conn, $sql)) {
        echo 
        "<script>
            window.location = ('list-accounts.php');
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);;
    }
    mysqli_close($conn);
?>