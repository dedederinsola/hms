<?php
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Complaint Form</title>

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
              <div class="sidebar-menu-content">
                <?php require "studentnavbar.php"; ?>
            </div>
        </div>
          <!-- Sidebar Area End Here -->

        <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Log A Complaint</h3>
                </div>
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
            
        <table cellspacing="200" cellpadding="20">
            <form action="complaint.php" method="post">
            <!-- <tr>
                <td>
                    <label for="room_no">Room Number:</label>
                </td>

                <td>
                    <input type="text" name="room_no" /><br>
                </td>
            </tr> -->

            <tr>
                <td>
                    <label for="category">Category:</label>
                </td>
                <td>
                    <select name="category" id="category">
                    <option value="electrical">Electrical issues <span class="dpmenu">(e.g lights, sockets, fan)</span></option>
                    <option value="woodwork">Carpentary issues <span class="dpmenu">(e.g doors, cupboards, fan)</span></option>
                    <option value="bed">Bed issues <span class="dpmenu">(e.g bunks, mattress, window)</span></option>
                    <option value="other">Other issues <span class="dpmenu">(e.g toilets, roof, window)</span></option>
                </select><br>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="description">Description of the problem:</label>
                </td>
                <td>
                    <input type="text" name="description" style="min-height: 50px; width: 300px;"/><br>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="date_time_available">Available time for repairs:</label>
                </td>
                <td>
                    <input type="datetime-local" name="date_time_available" /><br>
                </td>
            </tr>

            <tr>
                <td colspan="2" style="text-align: center;">
                    <button type="submit" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Go</button>
                </td>
            </tr>

            <tr>
                <span class="success" style="color:green; font-weight:bold; display: block; text-align: center;"><?php echo $success; ?></span>
                <span class="error" style="color:red; font-weight:bold; display: block; text-align: center;"><?php echo $error; ?></span>

            </tr>
            </form>
            <!-- <div class="popup"" <?php if (isset($_SESSION['form_submitted'])) { echo 'show'; } ?>>
              <p>Your complaint will be attended to.</p>
            </div> -->
        </table>
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
