<?php
    include('test.php');
    include_once("dbcon.php");
    $ownuser = $_SESSION['user'];
    $consult = "SELECT * FROM `accounts` WHERE ownuser = '$ownuser'";
    $result_sql = mysqli_query($conn, $consult);
    if($result_sql === FALSE) {
        die(mysqli_error());
    }
?>
<!DOCTYPE html>
<html lang='PT-BR'>
    <head>
        <meta charset='UTF-8'/>
        <title> List of Accounts </title>
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <link rel = "shortcut icon" type = "imagem/x-icon" href = "img/favicon.png"/>
    </head>
    <body background="http://nexusnx.com/files/backgrounds/bg3.jpg">
        <div id="container">
            <div id="box3">
                <table class="table table-striped table-bordered table-hover ">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">ID</th>    
                        <th scope="col">Account name</th>
                        <th scope="col">Email</th>
                        <th scope="col">User</th>
                        <th scope="col">Password</th>
                        <th scope="col">Observations</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <?php
                        while($data = mysqli_fetch_assoc($result_sql)){
                    ?>
                        <tbody>
                            <tr>
                                <th scope="row"> <?php echo $data["id"]; ?> </th>
                                <td> <?php echo $data["name"]; ?> </td>
                                <td> <?php echo $data["email"]; ?> </td>
                                <td> <?php echo $data["user"]; ?> </td>
                                <td> ********* </td>
                                <td> <?php echo $data["obs"]; ?> </td>
                                <td>
                                    <button type="button" class="btn btn-warning far fa-eye" data-toggle="modal" data-target="#myModal" 
                                    data-id="<?php echo $data["id"]; ?>"
                                    data-name="<?php echo $data["name"]; ?>"
                                    data-pass="<?php echo $data["pass"]; ?>"
                                    v></button>

                                    <button type="submit" class="btn btn-primary far fa-edit" data-toggle="modal" data-target="#exampleModal" data-whateverid="<?php echo $data["id"]; ?>"
                                    data-whatevername="<?php echo $data["name"]; ?>"
                                    data-whateveremail="<?php echo $data["email"]; ?>"
                                    data-whateveruser="<?php echo $data["user"]; ?>"
                                    data-whateverpass="<?php echo $data["pass"]; ?>"
                                    data-whateverobs="<?php echo $data["obs"]; ?>"
                                    ></button>
                                    
                                    <a type="submit" href="del.php?id='<?php echo $data["id"];?>'" class="btn btn-danger far fa-trash-alt" id="btn-del"></a>
                                    
                                </td>
                            </tr>
                        </tbody>
                        <?php 
                            $id = $data["id"];
                            $_SESSION['id'] = $id;
                        ?>
                    <?php } ?>
                </table>
                <button class="btn btn-outline-danger btn-sm" id="btn-back-home" onclick="backhome()">Back</button>
            </div>
        </div>
        <!-- ===+===+===+===+=== VIEW PASS MODAL AREA START ===+===+===+===+===-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $data["name"]; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <p class="viewpass"><?php echo $data["pass"]; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===+===+===+===+=== VIEW PASS MODAL AREA END ===+===+===+===+===-->

        <!-- ===+===+===+===+=== EDIT MODAL AREA START ===+===+===+===+===-->

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ID: <?php echo $data["id"]; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="changes.php">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Name:</label>
                                <input type="text" name="name" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Email:</label>
                                <input type="text" name="email" class="form-control" id="recipient-email">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">User:</label>
                                <input type="text" name="user" class="form-control" id="recipient-user">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Password:</label>
                                <input type="text" name="pass" class="form-control" id="recipient-pass">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Observations:</label>
                                <textarea name="obs" class="form-control" id="message-text"></textarea>
                            </div>
                            <input type="hidden" name="id" id="id_account">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-sucess">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===+===+===+===+=== EDIT MODAL AREA END ===+===+===+===+===-->

        <!-- ===+===+===+===+=== SCRIPTS AREA START ===+===+===+===+===-->

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script> // EDIT MODAL SCRIPT
            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var id = button.data('id')
                var name = button.data('whatevername')
                var email = button.data('whateveremail')
                var user = button.data('whateveruser')
                var pass = button.data('whateverpass')
                var obs = button.data('whateverobs')
                var modal = $(this)
                modal.find('.modal-title').text('Account ID: ' + id)
                modal.find('.modal-body #recipient-name').val(name)
                modal.find('.modal-body #recipient-email').val(email)
                modal.find('.modal-body #recipient-user').val(user)
                modal.find('.modal-body #recipient-pass').val(pass)
                modal.find('.modal-body #message-text').val(obs)
                modal.find('.modal-body #id_account').val(id)
            })
        </script>

        <script> // VIEW PASS MODAL SCRIPT
            $('#myModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var id = button.data('id')
                var name = button.data('name')
                var pass = button.data('pass')
                var modal = $(this)
                modal.find('.modal-title').text('Account: ' + name)
                modal.find('.modal-body').text(pass)
            })
        </script>

        <script src="js/script.js"></script>

    </body>
</html>