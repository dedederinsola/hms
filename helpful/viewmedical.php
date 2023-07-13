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
                                                <h3>MEDICAL REPORT</h3>
                                            </div>
                                                      </div>

                                        <div class="table-box-wrap">
                                            <form class="search-form-box" action="index2.php" method="post">
                                                <div class="row gutters-8">
                                                    <div class="col-lg-3 col-8 form-group">
                                                    
                                                    </div>
                                                    <div class="col-lg-3 col-8 form-group">
                                                     
                                                    </div>
                                                    <div class="col-lg-3 col-12 form-group">
                                                        <input type="text" name ="matricno" placeholder="Search by Matric no...."
                                                            class="form-control">
                                                    </div>
                                                    <div class="col-lg-3 col-6 form-group">
                                                        <button type="submit"
                                                            class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                                                    </div>
                                                      
                                                </div>
                                            </form>
                                           

                                        </div>


                                             <div class="table-responsive result-table-box">
    <?php
    $a=$_POST['matricno'];
     $b=$_POST['department'];
      $c=$_POST['session'];
$sql = "SELECT * FROM hostelrequest where Matricno = '$a' || Department= '$b' ||  Session= '$c' ";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        
     echo '<table border=1 cellpadding=1 width=" 100%">';
           
         
              echo "<tr>";
                echo "<th>Surname</th>";
                echo "<th>Firstname</th>";
                echo "<th>Matricno</th>";
                echo "<th>Programme</th>";
                echo "<th>Department</th>";
                echo "<th>Session</th>";
                echo "<th>Level</th>";
                echo "<th>Disable</th>";
                echo "<th>Room</th>";
                echo "<th>Amount</th>";
              
            echo "</tr>";
  

        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['Surname'] . "</td>";
                echo "<td>" . $row['Firstname'] . "</td>";
                echo "<td>" . $row['Matricno'] . "</td>";
                echo "<td>" . $row['Programme'] . "</td>";
                   echo "<td>" . $row['Department'] . "</td>";
                echo "<td>" . $row['Session'] . "</td>";
                echo "<td>" . $row['Level'] . "</td>";
                echo "<td>" . $row['Disable'] . "</td>";
                   echo "<td>" . $row['Room'] . "</td>";
                echo "<td>" . $row['Amount'] . "</td>";
           
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);
?>
                                            
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