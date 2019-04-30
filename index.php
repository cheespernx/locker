<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Nexus Locker</title>
        <link rel = "shortcut icon" type = "imagem/x-icon" href = "img/favicon.png"/>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
    </head>
    <body background="http://nexusnx.com/files/backgrounds/bg3.jpg">
        <div id="container">
            <div id="box2">
                <fieldset>
                    <div>
                        <img src="img/favicon.png" style="width: 80px;"/>
                        <legend style="font-size: 15pt;">Login</legend>
                    </div>
                    <hr style="margin-top: 0;"/>
                    <form id="formLogin" method="POST" action="login.php">
                        <?php
                        if(isset($_SESSION['not-auth'])):
                        ?>
                            <div class="alert alert-danger" role="alert">
                                Username or Password incorrects!
                            </div>
                        <?php
                        endif;
                        unset($_SESSION['not-auth']);
                        ?>
                        <label for="email-login">User</label>
                        <input type="text" id="user-login" name="user" class="form-control" placeholder="Username" style="margin-bottom: 10px;"/>
                        <label for="txt-pass">Password</label>
                        <input type="password" name="pass" class="form-control" id="pass-login" placeholder="Password"/>
                        <br/>
                        <button type="submit" id="btn-login" class="btn btn-outline-success btn-block">Login
                        </button>
                        <p style="margin-bottom: -5px; margin-top: 15px;">Don't have a account?</p>
                        <a href="register.php" style="font-size: 10pt;">Register here!</a>
                    </form>
                </fieldset> 
            </div>
        </div>

        <script src="js/script.js"></script>

    </body>
</html>