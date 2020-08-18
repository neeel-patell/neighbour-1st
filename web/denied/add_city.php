<?php
    include_once 'validate_admin.php'; 
    $msg = "";
    if(isset($_GET['msg'])){
        $msg = $_GET['msg'];
    }
    $state = $conn->query("SELECT id,name from state");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Neighbour-1st - Admin - Add City</title>
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
                <h5 class="text-center p-3 bg-primary text-white">Add City</h5>
                <div class="container">
                    <form action="insert_city.php" method="post" class="card p-4 mt-5">
                    
                        <?php if($msg != ""){ ?>
                            <div class="alert alert-dark h6"><?php echo $msg ?></div>
                        <?php } ?>
                        
                        <div class="form-group mt-2">
                            <label class="label">State Name :</label>
                            <select name="state" id="state" class="form-control">
                            <option value="">- - - Select State - - -</option>

                                <?php $c=1; while($row = $state->fetch_array()){ ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $c++.". ".$row['name']; ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label class="label">City Name :</label>
                            <input type="text" name="city" id="city" class="form-control" max-length="30" placeholder="Enter City Name" required>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <button type="submit" class="form-control btn-success"><i class="fas fa-plus"></i> Add City</button>
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
