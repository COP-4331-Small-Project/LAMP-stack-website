<?php
include_once('api/config.php');?>

<!DOCTYPE html>
<html lang="en" xmlns="">
<head>
    <title>MyHogwarts - Your Contacts</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="libs/jquery/jquery-3.3.1.slim.min.js"></script>
    <link rel="stylesheet" href="/libs/bootstrap/css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="frontend/home.js"></script>
    <link rel="stylesheet" href="/frontend/homeStyle.css">
    <script src="libs/jquery/jquery-3.5.1.js"></script>
    <script src="libs/jquery/jquery.dataTables.min.js"></script>
    <script src="frontend/dataTables.bootstrap4.min.css"></script>
    <script src="js/searchPanes.bootstrap4.min.js"></script>
    <script src="js/dataTables.select.min.js"></script>
    <script src="js/contacts.js"><</script>
</head>


<!-- Navbar-->
<body class="p-3">
        <nav class="navbar navbar-expand-lg fixed-top py-3">
            <div class="container"><a href="#" class="navbar-brand text-uppercase font-weight-bold">Welcome Back</a>
                <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>

                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold">Add User</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold">Edit Contacts</a></li>
                        <li class="nav-item active"><a href="/api/login.php" class="nav-link text-uppercase font-weight-bold">Logout <span class="sr-only">(current)</span></a></li>

                    </ul>
                </div>
            </div>
        </nav>

        <div class="container py-5">
            <header class="text-center text-white">
                <h1 class="display-4">My Hogwarts Contacts</h1>
            </header>
            <div class="row py-5">
                <div class="col-lg-10 mx-auto">
                    <div class="card rounded shadow border-0">
                        <div class="card-body p-5 bg-white rounded">
                            <div class="table-responsive">
                                <table id="example" style="width:100%" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Surname</th>
                                        <th>Email</th>
                                        <th>Phone Contact</th>
                                        <th>House</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Tiger</td>
                                        <td>Nixon</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>Gryffindor</td>
                                    </tr>
                                    <tr>
                                        <td>Garrett</td>
                                        <td>Winters</td>
                                        <td>Tokyo</td>
                                        <td>63</td>
                                        <td>Hufflepuff</td>
                                    </tr>
                                    <tr>
                                        <td>Ashton</td>
                                        <td>Cox</td>
                                        <td>San Francisco</td>
                                        <td>66</td>
                                        <td>Ravenclaw</td>
                                    </tr>
                                    <tr>
                                        <td>Cedric</td>
                                        <td>Developer</td>
                                        <td>Edinburgh</td>
                                        <td>22</td>
                                        <td>Hufflepuff</td>
                                    </tr>
                                    <tr>
                                        <td>Airi</td>
                                        <td>Satou</td>
                                        <td>Tokyo</td>
                                        <td>33</td>
                                        <td>Slytherin</td>
                                    </tr>
                                    <tr>
                                        <td>Brielle</td>
                                        <td>Williamson</td>
                                        <td>New York</td>
                                        <td>61</td>
                                        <td>Ravenclaw</td>
                                    </tr>
                                    <tr>
                                        <td>Herrod</td>
                                        <td>Chandler</td>
                                        <td>San Francisco</td>
                                        <td>59</td>
                                        <td>Hufflepuff</td>
                                    </tr>
                                    <tr>
                                        <td>Rhona</td>
                                        <td>Davidson</td>
                                        <td>Tokyo</td>
                                        <td>55</td>
                                        <td>Hufflepuff</td>
                                    </tr>
                                    <tr>
                                        <td>Colleen</td>
                                        <td>Hurst</td>
                                        <td>San Francisco</td>
                                        <td>39</td>
                                        <td>Slytherin</td>
                                    </tr>
                                    <tr>
                                        <td>Sonya</td>
                                        <td>Frost</td>
                                        <td>Edinburgh</td>
                                        <td>23</td>
                                        <td>Slytherin</td>
                                    </tr>
                                    <tr>
                                        <td>Jena</td>
                                        <td>O'Gaines</td>
                                        <td>London</td>
                                        <td>30</td>
                                        <td>Slytherin</td>
                                    </tr>
                                    <tr>
                                        <td>Quinn/td>
                                        <td>Flynn<</td>
                                        <td>Edinburgh</td>
                                        <td>22</td>
                                        <td>Gryffindor</td>
                                    </tr>
                                    <tr>
                                        <td>Charde</td>
                                        <td>Marshall</td>
                                        <td>San Francisco</td>
                                        <td>36</td>
                                        <td>Slytherin</td>
                                    </tr>
                                    <tr>
                                        <td>Haley</td>
                                        <td>Kennedy</td>
                                        <td>London</td>
                                        <td>43</td>
                                        <td>gryffindor</td>
                                    </tr>
                                    <tr>
                                        <td>Tatyana</td>
                                        <td>Regi</td>
                                        <td>London</td>
                                        <td>19</td>
                                        <td>2010/03/17</td>
                                    </tr>
                                    <tr>
                                        <td>Michael</td>
                                        <td>Marke</td>
                                        <td>London</td>
                                        <td>66</td>
                                        <td>Ravenclaw</td>
                                    </tr>
                                    <tr>
                                        <td>Paul</td>
                                        <td>Byrd</td>
                                        <td>New York</td>
                                        <td>64</td>
                                        <td>Slytherin</td>
                                    </tr>
                                    <tr>
                                        <td>Gloria</td>
                                        <td>Greer</td>
                                        <td>New York</td>
                                        <td>59</td>
                                        <td>Ravenclaw</td>
                                    </tr>
                                    <tr>
                                        <td>Bradley</td>
                                        <td>Little</td>
                                        <td>London</td>
                                        <td>41</td>
                                        <td>Gryffindor</td>
                                    </tr>
                                    <tr>
                                        <td>Dai</td>
                                        <td>Personnel</td>
                                        <td>Edinburgh</td>
                                        <td>35</td>
                                        <td>Slytherin</td>
                                    </tr>
                                    <tr>
                                        <td>Jenette</td>
                                        <td>Caldwell</td>
                                        <td>New York</td>
                                        <td>30</td>
                                        <td>Slytherin</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


