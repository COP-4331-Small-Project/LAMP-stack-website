

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>MyHogwarts - Your Contacts</title>
    <!-- NAV BAR-->
    <link rel="stylesheet" href="/libs/bootstrap/css/bootstrap.min.css">
    <script src="libs/jquery/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="libs/bootstrap/js/navbar.js"></script>
    <script src="frontend/home.js"></script>
    <!-- DATA TABLE-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <link rel="stylesheet" href="frontend/homeStyle.css">
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body class="p-3">
<!-- Navbar-->
    <nav class="navbar navbar-expand-lg fixed-top py-3">
        <div class="container">
            <a href="#" class="navbar-brand text-uppercase font-weight-bold">Welcome</a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>

            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="/api/logout.php" class="nav-link text-uppercase font-weight-bold">Logout <span class="sr-only">(current)</span></a></li>
                </ul>
            </div>
        </div>
    </nav>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header clearfix">
                            <h2 style="color:#FAFAFA" class="pull-left">My Contacts</h2>
                            <a href="create.php" class="btn btn-success pull-right">Add New Contact</a>
                        </div>
                        <?php
                        // Include config file
                        require_once "api/config.php";
                        // Attempt select query execution
                        $sql = "SELECT * FROM u725926379_contactdb.Contacts";
                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                echo "<table class='table table-striped table-dark'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>First Name</th>";
                                        echo "<th>Last Name</th>";
                                        echo "<th>Phone Number</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>House</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['firstName'] . "</td>";
                                    echo "<td>" . $row['lastName'] . "</td>";
                                    echo "<td>" . $row['phoneNumber'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['house'] . "</td>";
                                    echo "<td>";
                                    echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                    echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                    echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                                echo "</table>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                        }

                        // Close connection
                        mysqli_close($link);
                        ?>
                    </div>
                </div>
            </div>
        </div>

</html>


