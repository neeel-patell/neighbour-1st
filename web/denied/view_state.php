<?php
    include_once 'validate_admin.php'; 
    $state = $conn->query("select id,name,active from state");
    $msg = "";
    if(isset($_GET['msg'])){
        $msg = $_GET['msg'];
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Neighbour-1st - Admin - Dashboard</title>
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
                <h5 class="text-center p-3 bg-primary text-white">View State</h5>
                <div class="table-responsive p-3 border-0 table-bordered text-center">
                    
                    <?php if($msg != ""){ ?>
                    <div class="alert alert-primary h6"><?php echo $msg ?></div>
                    <?php } ?>
                    
                    <table class="table border">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Sr No.</th>
                                <th scope="col" class="w-75">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $c = 1;
                                while($row = $state->fetch_array()){ ?>
                                    <tr>
                                        <th scope="row"><?php echo $c++; ?></th>
                                        <td><?php echo $row['name']; ?></td>
                                        <td>

                                            <?php if($row['active'] == 1){ ?>
                                            <button class="btn p-0 btn-link" onclick="if(confirm('Do You Want to Disable <?php echo $row['name'] ?>?') == true){location.href='disable_state.php?state=<?php echo $row['id']; ?>'}">Disable</button>
                                            <?php } else{ ?>
                                            <button class="btn p-0 btn-link" onclick="if(confirm('Do You Want to Enable <?php echo $row['name'] ?>?') == true){location.href='enable_state.php?state=<?php echo $row['id']; ?>'}">Enable</button>
                                            <?php } ?>

                                            / <button class="btn p-0 btn-link" onclick="if(confirm('Do You Want to Delete <?php echo $row['name'] ?>?') == true){location.href='delete_state.php?state=<?php echo $row['id']; ?>'}">Delete</button> 
                                        </td>
                                    </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php include_once 'footer.php'; ?>
    </body>
</html>
