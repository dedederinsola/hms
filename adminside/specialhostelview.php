<?php
include_once 'connectMySQLi.php';
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Resolved Complants</title>

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

 <style>
    .search-wrapper {
        display: flex;
        /* max-width: 1000px; Limit the maximum width of the search box to 1000px */
        margin: 0 auto; /* Center the search box horizontally */
        /* border: 1px solid #ccc; Optional border for visual clarity */
        /* border-radius: 5px; Rounded corners (optional) */
        overflow: hidden; /* Prevents content overflow */
    }

    #parameter {
    flex: 0; /* Allow the dropdown to take up available space */
    border-radius: 5px 0 0 5px; /* Apply rounded corners to the left side */
    border: none;
    border-right: 1px solid #ccc; /* Add a border on the right side */
    padding: 7px;
    width: auto; /* Remove min-width and set width to auto */
    white-space: nowrap; /* Prevent the button from wrapping text to the next line */
    }
    
    input[name='search-box'] {
        flex: 1; /* Allow the input to take up available space */
        height: 40px;
        border: 1px 0px 1px 0px solid #ccc; /* Remove the input border */
        padding: 7px;
    }

    #sign-out-button {
        height: 40px;
        border-radius: 5px 5px 5px 5px; /* Apply rounded corners to the right side */
        white-space: nowrap; /* Prevent the button from wrapping text to the next line */
        overflow: hidden; /* Hide any overflowing text inside the button */
        vertical-align: middle;
    }
    </style>

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
                    <h3>Hostel View</h3>
                </div>
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
        <form action = '<?php echo $_SERVER['PHP_SELF']; ?>' method= 'post'>
            <div class="search-wrapper">
                <label for="search-box" name="parameter" id="parameter">Hostel:</label>
                <input type="text" name= 'search-box'/>
                <button type='submit' name="vacate" id="sign-out-button" class="btn-fill-lg bg-blue-dark btn-hover-yellow" style= "border-radius: 0 5px 5px 0">Search</button>
            </div>
        </form>


        <?php 

        $hostel = NULL;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve the input data
            error_reporting(0);
            $hostel = str_replace(' ', '_', $_POST['search-box']);
            // return;
        }

        $query = "SELECT * FROM $hostel WHERE name IS NOT NULL AND matric_no IS NOT NULL";


        echo '<table class="table table-bordered noprint" border="2" cell cellspacing="15" cellpadding="5" width="1000"> 
            <thead class="thead-light"> 
                <th> <font face="Arial">Room</font> </th> 
                <th> <font face="Arial">Matric No</font> </th> 
                <th> <font face="Arial">Name</font> </th> 
                <th> <font face="Arial">Room Type</font> </th> 
            </thead>';

        if ($result = $conn->query($query)) {
            while ($row = $result->fetch_assoc()) {
                $room_no = $row["room_no"];
                $matric_no = $row["matric_no"];
                $name = $row["name"];
                $room_type = $row["room_type"];

                echo '<tr> 
                        <td>'.$room_no.'</td> 
                        <td>'.$matric_no.'</td> 
                        <td>'.$name.'</td> 
                        <td>'.$room_type.'</td> 
                    </tr>';
            }
            $result->free();
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