<?php
    include 'studentdetailsMySQLi.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Special Rooms</title>

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
              <?php include "studentnavbar.php"; ?>
          </div>
          <!-- Sidebar Area End Here -->

        <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Special Rooms</h3>
                </div>
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">


<?php 
    $user = "root"; 
    $password = ""; 
    $database = "crawford_uni"; 
    $conn = new mysqli("localhost", $user, $password, $database); 
    $tableNames =[];

    $gender = $_SESSION['gender'];

    $hostel = NULL;
    $no_of_rooms = NULL;
    $room_type = NULL;
    $max_capacity = NULL;
    $occupant = NULL; 
    $remark = NULL; 



    if ($gender === 'Female') {

        $query = "SELECT hostel FROM girls_special";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $tableNames[] = $row["hostel"];
        }
    

        echo '<p style="font-weight: bold;">Girl\'s Special Hostels</p>';

        if (empty($tableNames)) {
            echo 'No special hostels found.';
        } else{
            foreach ($tableNames as $tableName) {
                echo '<table class="table table-bordered noprint" border="2" cell cellspacing="15" cellpadding="5" width="1000"> 
                <thead class="thead-light"> 
                    <tr colspan = "7"><th>' .$tableName. '</th></tr>
                    <th> <font face="Arial">Hostel Name</font> </th> 
                    <th> <font face="Arial">Number of Rooms</font> </th> 
                    <th> <font face="Arial">Room Type</font> </th> 
                    <th> <font face="Arial">Maximum Capacity</font> </th> 
                    <th> <font face="Arial">Occupant</font> </th> 
                    <th> <font face="Arial">Remark</font> </th> 
                    <th> <font face="Arial">Request</font> </th> 
    
                </thead>';
    
    
                $available = "SELECT t.* FROM $tableName t
                            INNER JOIN (
                            SELECT DISTINCT room_no
                            FROM $tableName
                            WHERE name IS NULL AND matric_no IS NULL
                            ) sub
                            ON t.room_no = sub.room_no";
                $availableResult = $conn->query($available);
                if ($availableResult) {
                        while ($row = mysqli_fetch_assoc($availableResult)) {
                            $hostel = $row["hostel"];
                            $no_of_rooms = $row["no_of_rooms"];
                            $room_type = $row["room_type"];
                            $max_capacity = $row["max_capacity"];
                            $occupant = $row["occupant"]; 
                            $remark = $row["remark"]; 

                            echo '<tr> 
                                    <td>'.$hostel.'</td> 
                                    <td>'.$no_of_rooms.'</td> 
                                    <td>'.$room_type.'</td> 
                                    <td>'.$max_capacity.'</td> 
                                    <td>'.$occupant.'</td> 
                                    <td>'.$remark.'</td> 
                                </tr>';
                        }
                    $result->free();
                } else{
                    echo 'No free rooms';
                    break;
                }
                
            }
        }
        echo '</table></br></br>';   
        }

    if ($gender === 'Male') {

        $query = "SELECT hostel FROM boys_special";

        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $tableNames[] = $row["hostel"];
        }
     
        echo '<p style="font-weight: bold;">Boy\'s Special Hostels</p>';

        echo '<table class="table table-bordered noprint" border="2" cell cellspacing="15" cellpadding="5" width="1000"> 
            <thead class="thead-light"> 
                <th> <font face="Arial">Hostel Name</font> </th> 
                <th> <font face="Arial">Number of Rooms</font> </th> 
                <th> <font face="Arial">Room Type</font> </th> 
                <th> <font face="Arial">Maximum Capacity</font> </th> 
                <th> <font face="Arial">Occupant</font> </th> 
                <th> <font face="Arial">Remark</font> </th> 
            </thead>';

        if (empty($tableNames)) {
            echo 'No special hostels found.';
        }
        else{
            foreach ($tableNames as $tableName) {
                $available = "SELECT t.* FROM $tableName t
                            INNER JOIN (
                            SELECT DISTINCT room_no
                            FROM $tableName
                            WHERE name IS NULL AND matric_no IS NULL
                            ) sub
                            ON t.room_no = sub.room_no";
                  $availableResult = $conn->query($available);
                if ($availableResult) {
                    echo 'HI';
                    var_dump($matric_no);
                    while ($row = mysqli_fetch_assoc($availableResult)) {
                        $hostel = $row["hostel"];
                        $no_of_rooms = $row["no_of_rooms"];
                        $room_type = $row["room_type"];
                        $max_capacity = $row["max_capacity"];
                        $occupant = $row["occupant"]; 
                        $remark = $row["remark"]; 

                        echo '<tr> 
                                <td>'.$hostel.'</td> 
                                <td>'.$no_of_rooms.'</td> 
                                <td>'.$room_type.'</td> 
                                <td>'.$max_capacity.'</td> 
                                <td>'.$occupant.'</td> 
                                <td>'.$remark.'</td> 
                            </tr>';
                        
                    }
                    $result->free();
                } 
                else{
                    echo 'No free rooms';
                    break;
                }
                
            }
        }
        echo '</table></br></br>';   
        }
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