<?php
    include_once 'validate_admin.php'; 
    $msg = "";
    if(isset($_GET['msg'])){
        $msg = $_GET['msg'];
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Neighbour-1st - Admin - Add State</title>
        <?php include_once 'css_files.php' ?>
    </head>
    <body>
        <div class="bg-dark container-fluid p-3" id="sidebarCollapse" style="min-height: 10vh;">
        <h4 class="text-white">Neighbour-1st</h4>
            <button type="button" class="btn btn-outline-light mr-2 mt-2"><i class="fas fa-grip-lines"></i></button>
        </div>
        <div class="d-flex p-0">
            <?php include_once 'sidebar.php' ?>
            <div class="container-fluid p-0" id="content" style="display :block;">
                <h5 class="text-center p-3 bg-primary text-white">Add State</h5>
                <div class="container w-75">
                    <form action="insert_state.php" method="post" class="card p-4 mt-5">
                    
                        <?php if($msg != ""){ ?>
                            <div class="alert alert-dark h6"><?php echo $msg ?></div>
                        <?php } ?>
                        
                        <div class="form-group mt-2">
                            <label class="label">Name :</label>
                            <input type="text" name="state" id="state" class="form-control" max-length="30" placeholder="Enter State Name" required>
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-success">Add</button>
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
