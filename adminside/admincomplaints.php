<?php
include_once 'connectMySQLi.php';

?>
<html>
<head>
    <meta charset="utf-8">
    <title>Active Complants</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="fonts/flaticon.css">
    <!-- Full Calender CSS -->
    <link rel="stylesheet" href="css/fullcalendar.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Data Table CSS -->
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Modernize js -->
    <script src="js/modernizr-3.6.0.min.js"></script>
    <script src="js/jsnew.js"></script>


    <!-- Bootstrap core CSS
    <link href="dashboardbootstrap.css" rel="stylesheet"> -->

    <!-- Add custom CSS here
    <link href="dashboard.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
 -->
  </head>

  <body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash">
        <!-- Header Menu Area Start Here -->
        <div class="navbar navbar-expand-md header-menu-one bg-light">
            <div class="nav-bar-header-one">
                <div class="header-logo">
                    <a href="#">
                        <img src="logo.png" alt="logo">
                    </a>
                </div>
                <div class="toggle-button sidebar-toggle">
                    <button type="button" class="item-link">
                        <span class="btn-icon-wrap">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="d-md-none mobile-nav-bar">                
                <button type="button" class="navbar-toggler sidebar-toggle-mobile">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
        <!-- Header Menu Area End Here -->
    
      <!-- Page content -->
      <div class="dashboard-page-one">
          <!-- Sidebar Area Start Here -->
          <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
              <div class="mobile-sidebar-header d-md-none">
                  <div class="header-logo">
                  <a href="#"><img src="logo.png" alt="logo"></a>
                  </div>
              </div>
              <?php include "adminnavbar.php"; ?>
          </div>
          <!-- Sidebar Area End Here -->

        <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Porter Dashboard</h3>
                </div>
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">

        <?php 
        $query = "SELECT * FROM activecomplaints";

        echo '<table class="table table-bordered noprint" border="2" border="2" cell cellspacing="15" cellpadding="5" width="1000"> 
            <thead class="thead-light"> 
                <th> <font face="Arial">Room</font> </th> 
                <th> <font face="Arial">Category</font> </th> 
                <th> <font face="Arial">Description</font> </th>
                <th> <font face="Arial">Date/Time</font> </th> 
                <th> <font face="Arial">Resolved?</font> </th>
            </thead>';

        if ($result = $conn->query($query)) {
            if ($result->num_rows == 0) {
                $message = 'No active complaints';
            }

            while ($row = $result->fetch_assoc()) {
                $room_no = $row["room_no"];
                $category = $row["category"];
                $description = $row["description"];
                $date_time_available = $row["date_time_available"];
                $resolved = $row["resolved"]; 
                

                echo '<tr> 
                        <td>'.$room_no.'</td> 
                        <td>'.$category.'</td> 
                        <td>'.$description.'</td> 
                        <td>'.$date_time_available.'</td> 
                        <td>
                            <form action="complaintresolve.php" method="POST">
                            <input type="hidden" name="room_no" value="'.$room_no.'">
                            <input type="hidden" name="category" value="'.$category.'">
                            <input type="hidden" name="description" value="'.$description.'">
                            <input type="hidden" name="date_time_available" value="'.$date_time_available.'">
                            <button type="submit" name="vacate" id="sign-out-button" class="btn-fill-lg bg-blue-dark btn-hover-yellow" style= " padding: 12px 15px;
                            max-width:150px; 
                            max-height:40px; 
                            font-size: 13px;
                            white-space: nowrap;
                            vertical-align: middle;
                            text-align:left;">Resolved</button></form>
                        </td>
                    </tr>';
            }
            $result->free();
            echo '</table>';
        } 
        // if (!empty($message)) {
        //     echo $message;
        // }
        ?>
        </div>
      </div>
      
    </div>
	
    <!-- jquery-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Counterup Js -->
    <script src="js/jquery.counterup.min.js"></script>
    <!-- Moment Js -->
    <script src="js/moment.min.js"></script>
    <!-- Waypoints Js -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Scroll Up Js -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- Full Calender Js -->
    <script src="js/fullcalendar.min.js"></script>
    <!-- Chart Js -->
    <script src="js/Chart.min.js"></script>
    <!-- Data Table Js -->
    <script src="js/jquery.dataTables.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>
    <script src="js/custom.js"></script>

    <!-- JavaScript
    <script src="dashboardjquery.js"></script>
    <script src="dashboardbootstrap.js"></script>

    Custom JavaScript for the Menu Toggle
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
    });
    </script> -->
</body>
</html>