<?php include_once 'validate_admin.php'; ?>
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
            <div class="container-fluid p-0" id="content" style="display :block;">
                <h5 class="text-center p-3 bg-primary text-white">Dashboard</h5>
                
            </div>
        </div>
        <?php include_once 'footer.php'; ?>
    </body>
</html>
