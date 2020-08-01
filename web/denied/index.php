<?php
    session_start();
    $msg = "";
    if(isset($_SESSION['login'])){
        header('location: dashboard.php');
    }
    if(isset($_GET['msg'])){
        $msg = $_GET['msg'];
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Neighbour-1st - Admin - Login</title>
        <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
        <link rel="stylesheet" href="../resources/css/sidebar.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta charset="UTF-8">
    </head>
    <body>
        <header class="jumbotron mb-0 p-5" style="min-height: 15vh; background: #371af4;">
            <h4 class="text-white" style="font-family: verdana;">Neighbour - 1st <i class="fas fa-shopping-cart"></i></h4>
        </header>
        <div class="row m-0">
            <div class="col-md-3"></div>
            <div class="container col-md-6 mt-5 mb-5 p-3" style="min-height: 65vh;">
                <div class="card border-dark">
                    <div class="container-fluid rounded text-center bg-danger text-white h4 text-monospace p-4 m-0">Login <i class="fas fa-user-alt"></i></div>
                    <form action="user_login.php" method="post" class="p-3">

                        <?php if($msg != ""){ ?>
                        <div class="alert alert-primary h6"><?php echo $msg ?></div>
                        <?php } ?>
                    
                        <div class="form-group mt-2">
                            <label class="label">Email :</label>
                            <input type="email" class="form-control" name="email" id="email" maxlength="256" placeholder="Enter Email" required>
                        </div>
                        <div class="form-group mt-2">
                            <label class="label">Password :</label>
                            <div class="input-group mb-3">
                                <input type="password" id="pass" name="pass" class="form-control" placeholder="Enter Password" aria-label="Password" minlength="8" maxlength="32" required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" tabindex="-1" type="button" id="show_pass"><i class="fas fa-eye"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="container mt-5 text-center">
                            <button type="submit" class="form-control btn-success mr-3">Login <i class="fas fa-lock"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        <footer class="jumbotron p-4 mb-0 bg-info" style="min-height: 10vh;">
            <h5 class="text-right"><i class="fas fa-copyright"></i> Lampros Tech</h5>
        </footer>
        <script src="../resources/js/font-awesome.js"></script>
        <script src="../resources/js/jquery.min.js"></script>
        <script src="../resources/js/popper.min.js"></script>
        <script src="../resources/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $("#show_pass").click(function(){
                if($('#pass').attr('type') === "password"){
                    $('#pass').attr('type','text');
                    $('#show_pass').html("<i class='fas fa-eye-slash'></i>");
                }
                else{
                    $('#pass').attr('type','password');
                    $('#show_pass').html("<i class='fas fa-eye'></i>");
                }
            });
        </script>
    </body>
</html>
