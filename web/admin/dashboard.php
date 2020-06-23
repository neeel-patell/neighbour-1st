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
        <div class="d-flex" style="min-height: 90vh;">
            <?php include_once 'sidebar.php' ?>
            <div class="container-fluid" id="content" style="display :block;">
                
            </div>
        </div>
        <?php include_once 'footer.php' ?>
    </body>
</html>
