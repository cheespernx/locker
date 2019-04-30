<?php 
    include('test.php');
?>
<!DOCTYPE html>
<html lang='PT-BR'>
    <head>
        <meta charset='UTF-8'/>
        <title> New Account </title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
        <link rel = "shortcut icon" type = "imagem/x-icon" href = "img/favicon.png"/>
        <script>
            window.onload = function (){
                var user = firebase.auth().currentUser;
                var uid = user.uid;
                document.getElementById('user-id').innerHTML = uid;
                firebase.auth().onAuthStateChanged(function(user) {
                    var user = firebase.auth().currentUser;
                    if (!user){
                        window.location = ('../index.html');
                    }
                });
            }
        </script>
    </head>
    <body background="http://nexusnx.com/files/backgrounds/bg3.jpg" onload="setId()">
        <div id="container">
            <div id="box">
                <fieldset>
                    <legend>New Account</legend>
                    <hr/>
                    <form class="form-horizontal" method="POST" action="process.php">
                        <label for="txt-name">Name of Account</label>
                        <input type="text" name="name" class="form-control" id="txt-name" placeholder="Write here..."/>
                        <br/>
                        <label for="txt-email">E-mail of Account</label>
                        <input type="email" name="email" class="form-control" id="txt-email" placeholder="Write here..."/>
                        <br/>
                        <label for="txt-user">User of Account</label>
                        <input type="text" name="user" class="form-control" id="txt-user" placeholder="Write here..."/>
                        <br/>
                        <label for="txt-pass">Password of Account</label>
                        <input type="password" name="password" class="form-control" id="txt-pass" placeholder="Write here..."/>
                        <br/>
                        <label for="txt-obs-account">Observations</label>
                        <textarea name="obs" class="form-control" id="txt-obs-account" cols="30" rows="2"></textarea>
                        <br/>
                        <p id="user-id"></p>
                        <input type="submit" value="Register" onclick="setId()" class="btn btn-primary btn-block"/>
                    </form>
                    <button class="btn btn-outline-danger btn-sm btn-block" style="margin-top: 10px;" id="btn-back-home" onclick="navigationHome()">Back</button>
                </fieldset>
            </div>
        </div>
        
        <script src="js/script.js"></script>
    </body>
</html>