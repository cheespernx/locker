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
            <div id="box4">
                <fieldset>
                    <div>
                        <img src="img/favicon.png" style="width: 80px;"/>
                        <legend style="font-size: 15pt;">Register</legend>
                    </div>
                    <hr style="margin-top: 0;"/>
                    <form id="formLogin" method="POST" action="cad.php">
                        <?php
                        if(isset($_SESSION['user_exists'])):
                        ?>
                            <div class="alert alert-danger" role="alert">
                                The username already exists!
                            </div>
                        <?php
                        endif;
                        unset($_SESSION['user_exists']);
                        ?>
                        <?php
                        if(isset($_SESSION['stats_cad'])):
                        ?>
                            <div class="alert alert-success" role="alert">
                                Register sucessful! Make Login <a href="login.php">here!</a>
                            </div>
                        <?php
                        endif;
                        unset($_SESSION['stats_cad']);
                        ?>
                        <label for="name-register">Name</label>
                        <input type="text" id="name-register" name="name" class="form-control" placeholder="Your Name" style="margin-bottom: 10px;"/>

                        <label for="user-register">User</label>
                        <input type="text" id="user-register" name="user" class="form-control" placeholder="Username" style="margin-bottom: 10px;"/>

                        <label for="txt-pass">Password</label>
                        <input type="password" name="pass" class="form-control" id="pass-login" placeholder="Password"/>
                        <br/>
                        <button type="submit" id="btn-register" class="btn btn-outline-success btn-block">Register
                        </button>
                        <p style="margin-bottom: -5px; margin-top: 15px;">Already have a account?</p>
                        <a href="index.php" style="font-size: 10pt;">Login here!</a>
                    </form>
                </fieldset> 
            </div>
        </div>

        <script src="js/script.js"></script>

    </body>
</html>