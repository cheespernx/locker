<?php 
    include('test.php');
    $logged = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Menu</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
        <link rel = "shortcut icon" type = "imagem/x-icon" href = "img/favicon.png"/>
    </head>
    <body background="http://nexusnx.com/files/backgrounds/bg3.jpg">
        <div id="container">
            <div id="box2">
                <fieldset>
                    <legend>Welcome <?php echo $logged ?></legend>
                    <hr style="margin-top: 0;"/>
                    <button id="btn-nav-new" name="btn-nav" class="btn btn-outline-success btn-sm btn-block" style="margin-bottom: -10px;">New Account</button>
                    <br/>
                    <button id="btn-nav-list" name="btn-nav" class="btn btn-outline-info btn-sm btn-block">View Accounts</button>
                    <br/>
                    <button id="btn-logout" name="btn-nav" onclick="logout()" class="btn btn-outline-danger btn-sm btn-block" style="margin-top: 10px;">Log Out</button>
                </fieldset> 
            </div>
        </div>
        <script src="js/script.js"></script>
    </body>
</html>