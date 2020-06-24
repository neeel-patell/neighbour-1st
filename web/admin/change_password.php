<?php include_once 'validate_admin.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Neighbour-1st - Admin - Dashboard</title>
        <?php include_once 'css_files.php' ?>
    </head>
    <body>
        <div class="bg-dark container-fluid p-3" id="sidebarCollapse" style="min-height: 10vh;">
            <h6>Dashboard</h6>    
            <button type="button" class="btn btn-outline-light mr-2 mt-2"><i class="fas fa-grip-lines"></i></button>
        </div>
        <div class="d-flex p-0">
            <?php include_once 'sidebar.php' ?>
            <div class="container-fluid p-0" id="content" style="display :block;">
                <h5 class="text-center p-3 bg-primary text-white">Change Password</h5>
                <div class="container w-75">
                    <form action="update_password.php" method="post" class="card p-4 mt-5">
                        <div class="form-group mt-2">
                            <label class="label">New Password :</label>
                            <div class="input-group mb-3">
                                <input type="password" id="pass" name="pass" class="form-control" placeholder="Enter New Password" aria-label="Password" minlength="8" maxlength="32" required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" tabindex="-1" id="show_pass"><i class="fas fa-eye"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label class="label">Confirm Password :</label>
                            <div class="input-group mb-3">
                                <input type="password" id="con_pass" name="con_pass" class="form-control" placeholder="Enter Confirm Password" aria-label="Password" minlength="8" maxlength="32" required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" tabindex="-1" id="show_con_pass"><i class="fas fa-eye"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-success">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include_once 'footer.php' ?>
        <script type="text/javascript">
            $('#show_pass').click(function(){
                if($('#pass').attr('type') === "password"){
                    $('#pass').attr('type','text');
                    $('#show_pass').html("<i class='fas fa-eye-slash'></i>");
                }
                else{
                    $('#pass').attr('type','password');
                    $('#show_pass').html("<i class='fas fa-eye'></i>");
                }
            });
            $('#show_con_pass').click(function(){
                if($('#con_pass').attr('type') === "password"){
                    $('#con_pass').attr('type','text');
                    $('#show_con_pass').html("<i class='fas fa-eye-slash'></i>");
                }
                else{
                    $('#con_pass').attr('type','password');
                    $('#show_con_pass').html("<i class='fas fa-eye'></i>");
                }
            });
        </script>
    </body>
</html>
