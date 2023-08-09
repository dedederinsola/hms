<?php
require 'studentdetailsMySQLi.php';

require 'allocationalgo.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Room Allocation</title>

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

    <style type="text/css">
     @media screen{
        .noprint{

        }
        .noScreen{
            display:none;
        }
    }

     @media print{
        .noprint{
            display:none;
        }
        .noScreen{

        }
    }

    table {
        min-width: auto;
        max-width: max-content;
        margin: 20px 20px 35px 50px;
    }

    td, th {
        min-width: 250px;
        padding-bottom: 20px;
    }

    .studentimg {
        height: 115px; 
        width: 115px; 
        line-height: 129px; 
        text-align: center; 
        border-radius: 50%; 
        overflow: hidden; 
        margin-left: 50px; 
        margin-bottom:40px
    }

    .printimg {
        height: 115px; 
        width: 115px; 
        /* line-height: 129px;  */
        /* text-align: center;  */
        border-radius: 15px;
        overflow: hidden; 
    }

    #printinfo{
        font-size: 25px;
        margin-bottom: 25px;
    }


    </style>


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
                        <img style = "max-width: 250px;" src="logo.png" alt="logo">
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
          <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color ">
              <div class="mobile-sidebar-header d-md-none">
                  <div class="header-logo  noprint">
                    <a href="#"><img src="logo.png" alt="logo"></a>
                  </div>
              </div>
              <div class="noprint">
                <?php include "studentnavbar.php"; ?>
              </div>
          </div>
          <!-- Sidebar Area End Here -->

        <div class="dashboard-content-one">
            <!-- Breadcubs Area Start Here -->
            <div class="breadcrumbs-area noprint">
                <h3>Student Details</h3>
            </div>
            <div class="row">
                <!-- Student Details Area Start Here -->
                <div class="noprint">
                    <div>
                        <p class="noprint">
                            <button style="font-size:18px; flex:1; margin: 20px 20px 20px 5px;" onclick="window.print()">Print</button>
                        </p>
                        <!-- Display the image using base64 encoded data -->
                        <div style="height: 115px; width: 115px; line-height: 129px; text-align: center; border-radius: 50%; overflow: hidden; margin-left: 50px; margin-bottom:40px">
                            <img src="data:image/jpeg;base64,<?php echo $imageDataEncoded; ?>" alt="Student Image">
                        </div>
                        <table>
                            <tr>
                                <td style="font-weight: bold;">Name:</td>
                                <td style="#"><span><?php echo $_SESSION['name']; ?></span></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Matric Number:</td>
                                <td><?php echo $_SESSION['matric_no']; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Date Of Birth:</td>
                                <td><?php echo $_SESSION['dob']; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Gender:</td>
                                <td><?php echo $_SESSION['gender']; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Level:</td>
                                <td><?php echo $_SESSION['level']; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Department:</td>
                                <td><?php echo $_SESSION['dept']; ?></td>
                            </tr>
                            <?php
                                if (!empty($_SESSION['room_no'])) {
                                    echo '<tr>
                                            <td style="font-weight: bold;">Room:</td>
                                            <td>'. $_SESSION['room_no'] .'</td>
                                        </tr>';          
                                }
                                if (!empty($_SESSION['room_type'])) {
                                    echo '<tr>
                                            <td style="font-weight: bold;">Accomodation Type:</td>
                                            <td>'. $_SESSION['room_type'] .'</td>
                                        </tr>';
                                }

                            ?>
                        </table>
                    </div>
                </div>

                <table width="100%" class="table table-borderless noScreen" style="max-width:100%;">
                    <tr>
                        <td align="center"><img src="main.png" width="105" height="145"></td>
                    </tr>
                    <tr>
                    <td align="center">
                    <p><b><span size="5" face="Baskerville Old Face" color="black">CRAWFORD UNIVERSITY, FAITH CITY, IGBESA, OGUN STATE</span> <br/>
                    </p>
                        <p align="center"><b><font size="5" face="Baskerville Old Face" color="black">HOSTEL SLIP</font></b><p align="center"></td>
                    </tr>
                </table> </br></br>
                
                <div>
                    <table width="100%" class="table table-borderless noScreen" style="max-width:100%;">
                        <tr>
                            <td width="25%">
                                <!-- Display the image using base64 encoded data -->
                                <div class="item-img">
                                    <img src="data:image/jpeg;base64,<?php echo $imageDataEncoded; ?>" style="width: 160px; height: 200px; border-radius: 10px;" alt="Student Image">
                                </div>
                            </td>
                        </tr>
                        <table class="table table-borderless noScreen" style="max-width:100%;">
                            <tr id="printinfo">
                                <td style="font-weight: bold;">Name:</td>
                                <td style="#"><span><?php echo $_SESSION['name']; ?></span></td>
                            </tr>
                            <tr id="printinfo">
                                <td style="font-weight: bold;">Matric Number:</td>
                                <td><?php echo $_SESSION['matric_no']; ?></td>
                            </tr>
                            <tr id="printinfo">
                                <td style="font-weight: bold;">Date Of Birth:</td>
                                <td><?php echo $_SESSION['dob']; ?></td>
                            </tr>
                            <tr id="printinfo">
                                <td style="font-weight: bold;">Gender:</td>
                                <td><?php echo $_SESSION['gender']; ?></td>
                            </tr>
                            <tr id="printinfo">
                                <td style="font-weight: bold;">Level:</td>
                                <td><?php echo $_SESSION['level']; ?></td>
                            </tr>
                            <tr id="printinfo">
                                <td style="font-weight: bold;">Department:</td>
                                <td><?php echo $_SESSION['dept']; ?></td>
                            </tr>
                            <?php
                                if (!empty($_SESSION['room_no'])) {
                                    echo '<tr id="printinfo">
                                            <td style="font-weight: bold;">Room:</td>
                                            <td>'. $_SESSION['room_no'] .'</td>
                                        </tr>';          
                                }
                                if (!empty($_SESSION['room_type'])) {
                                    echo '<tr id="printinfo">
                                            <td style="font-weight: bold;">Accomodation Type:</td>
                                            <td>'. $_SESSION['room_type'] .'</td>
                                        </tr>';
                                }

                            ?>
                        </table>
                    </table>
                    <footer class="footer-wrap-layout1 noScreen" style="text-align: left; vertical-align: bottom;">
                        <div class="copyright">
                            <?php echo 'Printed from Crawford eduPortal '. date("Y-m-d") . " " . date("H:i:s"); ?>                        </div>
                    </footer>
                </div>

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

