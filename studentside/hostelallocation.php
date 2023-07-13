<?php


if (!$_COOKIE['userchecked'])
{

	header("Location: ../index.php");
	exit;
}
				
?>


<?php

			include 'db.php';
    ?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Crawford eduPortal</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                    <a href="index.php?s=<?php echo $_GET[s]; ?>">
                        <img src="img/logo.png" alt="logo">
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
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Sidebar Area Start Here -->
            <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
               <div class="mobile-sidebar-header d-md-none">
                    <div class="header-logo">
             
                    </div>
               </div>
               <?php include "include/navbar.php"; ?>
            </div>
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Hostel Dashboard</h3>
                    <ul>
                        <li>
                        <a href="index.php?s=<?php echo $_GET[s]; ?>">Home</a>
                        </li>
                        <li>Dashboard</li>
                    </ul>
                </div>
                
                    <div class="col-sm-12">
                        <div class="row">
                          
                            <!-- Summery Area End Here -->
                            <!-- Exam Result Area Start Here -->
                            <div class="col-lg-12">
                                <div class="card dashboard-card-eleven">
                                    <div class="card-body">
                                        <div class="heading-layout1">
                                              <div class="item-title">
                                                <h3>Hostel Allocation Feedback</h3>
                                            </div>
                                            
                                        </div>
                                        <div class="table-box-wrap">
                                            <?php


// create a variable
$a=$_POST['surname'];
$b=$_POST['firstname'];
$c=$_POST['lastname'];
$d=$_POST['matricno'];
$e=$_POST['date'];
$f=$_POST['gender'];
$g=$_POST['department'];
$h=$_POST['session'];
$i=$_POST['level'];
$j=$_POST['room'];
$k=$_POST['blockname'];
$l=$_POST['hostelblock'];
$m=$_POST['roomno'];


if (mysqli_query($conn,"INSERT INTO hostelallocation VALUES ('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m')")){
                
echo $a;
echo "<br>"; 
echo "Allocation Successful !!!!!!!";
}
else {
echo "Student already allocated room. Check the matric no. Go to ICT Unit!!!!!!!!!";
}
   



?>

    <div>
        <div class="col-lg-3 col-12 form-group">
                                                     
                                                  

                                                   
                                                    </div>
          </div>

<div class="col-lg-3 col-12 form-group">
                                                     
                                                  

                                                           <a href="allocation.php"><button type="submit"
                                                            class="fw-btn-fill btn-gradient-yellow">Go back to allocation</button></a>
                                                    </div>


                                          
                                            
                                    </div>
                                </div>
                            </div>
                            <!-- Exam Result Area End Here -->

                        </div>
                    </div>
                </div>
                </div>
                </div>

                <!-- Footer Area Start Here -->
                <footer class="footer-wrap-layout1">
                <?php include "include/footer.php"; ?>
                </footer>
                <!-- Footer Area End Here -->
            </div>
        </div>
        <!-- Page Area End Here -->
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

</body>

</html>