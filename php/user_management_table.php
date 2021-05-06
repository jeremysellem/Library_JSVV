<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>User Management Data Table</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
        <style>
            body {
                margin: 0;
                padding: 0;
                color: #566787;
                background: #f5f5f5;
                font-family: 'Varela Round', sans-serif;
                font-size: 13px;
            }
            .table-responsive {
                margin: 30px 0;
            }
            .table-wrapper {
                min-width: 1000px;
                background: #fff;
                padding: 20px 25px;
                border-radius: 3px;
                box-shadow: 0 1px 1px rgba(0,0,0,.05);
            }
            .table-title {
                padding-bottom: 15px;
                background: #299be4;
                color: #fff;
                padding: 16px 30px;
                margin: -20px -25px 10px;
                border-radius: 3px 3px 0 0;
            }
            .table-title h2 {
                margin: 5px 0 0;
                font-size: 24px;
                justify-content: center;
                text-align: center;
            }
            table.table tr th, table.table tr td {
                border-color: #e9e9e9;
                padding: 12px 15px;
                vertical-align: middle;
            }
            table.table-striped tbody tr:nth-of-type(odd) {
                background-color: #fcfcfc;
            }
            table.table-striped.table-hover tbody tr:hover {
                background: #f5f5f5;
            }
            table.table th i {
                font-size: 13px;
                margin: 0 5px;
                cursor: pointer;
            }   
            table.table td:last-child i {
                opacity: 0.9;
                font-size: 22px;
                margin: 0 5px;
            }
            table.table td a {
                font-weight: bold;
                color: #566787;
                display: inline-block;
                text-decoration: none;
            }
            table.table td a:hover {
                color: #2196F3;
            }
            table.table td a.settings {
                color: #2196F3;
            }
            table.table td a.delete {
                color: #F44336;
            }
            table.table td i {
                font-size: 19px;
            }
            table.table .avatar {
                border-radius: 50%;
                vertical-align: middle;
                margin-right: 10px;
            }
            .pagination {
                float: right;
                margin: 0 0 5px;
            }
            .pagination li a {
                border: none;
                font-size: 13px;
                min-width: 30px;
                min-height: 30px;
                color: #999;
                margin: 0 2px;
                line-height: 30px;
                border-radius: 2px !important;
                text-align: center;
                padding: 0 6px;
            }
            .pagination li a:hover {
                color: #666;
            }   
            .pagination li.active a, .pagination li.active a.page-link {
                background: #03A9F4;
            }
            .pagination li.active a:hover {        
                background: #0397d6;
            }
            .pagination li.disabled i {
                color: #ccc;
            }
            .pagination li i {
                font-size: 16px;
                padding-top: 6px
            }
            .hint-text {
                float: left;
                margin-top: 10px;
                font-size: 13px;
            }
            .avatar {
                width: 30px;
                height: 30px;
            }
        </style>
    </head>
    <body>
        <!-- Archives Banner -->
        <img src="../images/classeurs.jpg" width="100%" height="100%">
        
        <!-- If the admin executed a deletion -->
        <?php
            // Check if your are a connected Admin and the argument DELETE is set
            if(isset($_GET["DELETE_USER"]) && $_GET["DELETE_USER"] > 0)  {
                if(isset($_SESSION["IS_ADMIN"]) && $_SESSION["IS_ADMIN"] == true) {
                    if(isset($_SESSION["CUSTOMER_ID"]) && $_SESSION["CUSTOMER_ID"] > 0) {

                        try {

                            // Initiate connection to DB
                            include "connexion_bdd.php";

                            // Prepare statement to delete user
                            $sql = "DELETE FROM USERS WHERE CUS_ID=" . $_GET["DELETE_USER"] . ";";
                            
                            // Execute query
                            $result = $conn->query($sql);
                            if($result) {
                                echo "<h2>Successful deletion</h2>";
                            }
                            else {
                                // For instance if someone has deleted it juste before I do
                                echo "<h3>An error occurred while deleting a user</h3>";
                            }
                        }
                        catch (Exception $e) {
                            echo $e;
                        }

                        $conn = null;
                    }
                }
            }
        ?>


        <!-- User data mangement table -->
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <h2>User Management</h2>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 6%;">ID</th>
                                <th style="width: 27%;">Name</th>
                                <th style="width: 27%;">Email address</th>
                                <th style="width: 17%;">Date Created</th>
                                <th style="width: 12%;">Role</th>
                                <th style="width: 11%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $users = null;

                                try {

                                    // Initiate connection to DB
                                    include "connexion_bdd.php";

                                    // Prepare statement to get all users
                                    $sql = "SELECT CUS_ID, CUS_FIRST_NAME, CUS_LAST_NAME, CUS_EMAIL, CUS_JOINDATE, CUS_TYPE FROM USERS;";
                                    
                                    // Execute query
                                    $users = $conn->query($sql);

                                    // Prepare statement to get the amount of users
                                    $sql = "SELECT COUNT(*) AS c FROM USERS;";
                                    
                                    // Execute query
                                    $count = $conn->query($sql)->fetch();

                                }
                                catch (Exception $e) {
                                    echo $e;
                                }

                                $conn = null;

                                // Run results
                                foreach ($users as $row) : ?>

                                    <tr style="width: 100%;">
                                        <td><?php echo $row["CUS_ID"]; ?></td>
                                        <td><img src="../images/user.png" class="avatar" alt="Avatar"> <?php echo $row["CUS_FIRST_NAME"] . " " . $row["CUS_LAST_NAME"]; ?></td>
                                        <td><?php echo $row["CUS_EMAIL"]; ?></td>
                                        <td><?php echo substr($row["CUS_JOINDATE"], 0, 10); ?></td>
                                        <td><?php echo $row["CUS_TYPE"]; ?></td>
                                        <td>
                                            <a href="#" class="settings" title="" data-toggle="tooltip" data-original-title="Settings"><i class="material-icons"></i></a>
                                            <a href="#" onclick="delete_user_dialog('<?php echo $row["CUS_ID"];?>', '<?php echo $row["CUS_TYPE"];?>');" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><i class="material-icons"></i></a>
                                        </td>
                                    </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="clearfix">
                        <div class="hint-text">
                            <?php echo "Showing ". $count['c'] . "  out of ". $count['c'] . " entries"; ?>
                        </div>
                        <ul class="pagination">
                            <li class="page-item disabled"><a href="#" class="page-link">Previous</a></li>
                            <li class="page-item active"><a href="#" class="page-link">1</a></li>
                            <li class="page-item disabled"><a href="#" class="page-link">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete user dialog box -->
        <script type="text/javascript">
            function delete_user_dialog(CUS_ID, CUS_TYPE) {
                if(CUS_TYPE == "ADMIN") {
                    bootbox.alert("You can't delete an Admin user");
                }
                else {
                    bootbox.confirm("Are you sure you want to delete this user (CUS_ID = " + CUS_ID + ") ?", function(result) {
                        if(result) {
                            window.location.replace("user_management_table.php?DELETE_USER="+CUS_ID);
                        }
                    });
                }
            };
        </script>
    </body>
</html>

<!-- code pour la page de choix USer management Product amnagement

                .table-title .btn {
            color: #566787;
            float: right;
            font-size: 13px;
            background: #fff;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
            }
            .table-title .btn:hover, .table-title .btn:focus {
            color: #566787;
            background: #f2f2f2;
            }
            .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
            }
            .table-title .btn span {
            float: left;
            margin-top: 2px;
            }
-->