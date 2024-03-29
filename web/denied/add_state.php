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
            <div class="container-fluid p-0" id="content">
                <h5 class="text-center p-3 bg-primary text-white">Add State</h5>
                <div class="container">
                    <form action="insert_state.php" method="post" class="card p-4 mt-5">
                    
                        <?php if($msg != ""){ ?>
                            <div class="alert alert-dark h6"><?php echo $msg ?></div>
                        <?php } ?>
                        
                        <div class="form-group mt-2">
                            <label class="label">Name :</label>
                            <input type="text" name="state" id="state" class="form-control" max-length="30" placeholder="Enter State Name" required>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <button type="submit" class="form-control btn-success"><i class="fas fa-plus"></i> Add State</button>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include_once 'footer.php'; ?>
    </body>
</html>
