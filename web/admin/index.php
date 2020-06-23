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
        <header class="jumbotron mb-0 p-5" style="min-height: 10vh; background: #371af4;">
            <h4 class="text-white" style="font-family: verdana;">Neighbour - 1st <i class="fas fa-shopping-cart"></i></h4>
        </header>
        <div class="container w-50 mt-3 mb-3">
            <div class="card border-dark" style="min-height: 70vh;">
                <div class="container-fluid rounded text-center bg-danger text-white h4 text-monospace p-4 m-0">Login <i class="fas fa-user-alt"></i></div>
                <form action="user_login.php" method="post" class="p-3">
                    <div class="form-group mt-2">
                        <label class="label">Email :</label>
                        <input type="email" class="form-control" name="email" id="email" maxlength="256" placeholder="Enter Email" required>
                    </div>
                    <div class="form-group mt-2">
                        <label class="label">Password :</label>
                        <div class="input-group mb-3">
                            <input type="password" id="pass" name="pass" class="form-control" placeholder="Enter Password" aria-label="Password" minlength="8" maxlength="32" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="show_pass"><i class="fas fa-eye"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="container w-50 mt-5 text-center">
                        <button type="submit" class="form-control btn-success mr-3">Login <i class="fas fa-lock"></i></button>
                    </div>
                </form>
                <div class="container-fluid rounded text-right bg-dark h6 text-monospace p-4 m-0" style="position: absolute; bottom: 0;">
                    <a href="forgot_password.php" class="btn-link text-white">Forgot Password ?</a>
                </div>
            </div>
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
                }
                else{
                    $('#pass').attr('type','password');
                }
            });
        </script>
    </body>
</html>
