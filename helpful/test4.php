<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

// Set database connection parameters
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'crawford_uni';

// Connect to the database using MySQLi
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}


    if (empty($_FILES['image'])) {
        $message = "Upload an image";
    }

    $validExtensions = ['jpeg', 'jpg', 'png'];
    $imageTemp = $_FILES['image']['tmp_name'];
    $imageExtension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));


    if (!in_array($imageExtension, $validExtensions)) {
        $message = "Only JPEG, JPG, and PNG files are allowed.";
    } else {


        $imageData = file_get_contents($imageTemp);

        if (empty($imageData)){
            echo "no picture found";
        }

    }

// else {
//     die ('Error executing query :' . $conn->errorInfo()[2] );

// }

// Close the database connection
$conn->close();

?>



<html>
<head>
    <meta charset="utf-8">
    <title>Image Upload</title>

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

            <table>
                <tr>
                    <td>
                        <form method="POST" enctype="multipart/form-data" action = "upload.php">
                            <!-- <label>Email Address:</label><br/>
                            <input type='email' name='email' required/>
                            <br/><br/><br/><br/> -->
                            <p>Only upload JPG, JPEG or PNG files</p>
                            <input type="file" name="image" accept="image/jpeg, image/jpg, image/png" />
                            <input type='hidden' name='matric_no' value="<?php echo $_SESSION['matric_no']?>" />
                            <input type="hidden" name="hostel" value="<?php echo $hostel; ?>">
                            <input type="hidden" name="room_no" value="<?php echo $room_no; ?>">
                            </br></br></br>
                            <button type="submit" name="upload" class="btn-fill-lg bg-blue-dark btn-hover-yellow" style= "padding: 12px 15px;max-width:150px; max-height:40px; font-size: 13px; white-space: nowrap; vertical-align: middle; text-align:left;">Upload</button></br>
                            </br></br></br>
                            <span class="success" style="font-weight:bold; display: block; text-align: center;"><?php echo $message; ?></span>
                        </form>
                    </td>
                </tr>
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

    <!-- <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
    });
    </script> -->

















    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="search-wrapper">
                    <select name="parameter" id="parameter" >
                        <option value="matric_no">Matric Number</option>
                        <option value="hostel">Hostel</option>
                        <option value="name">Student Name</option>
                    </select>
                    <input type="text" name="search-box" />
                    <button type="submit" name="search" id="sign-out-button" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Search</button>
                </div>
            </form>

</body>
</html>\



if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                if (isset($_POST['search'])) {

                    $value = $_POST['parameter'];

                    if ($_POST['parameter'] === "Hostel") {
                        $_SESSION['searchbox'] = str_replace(' ', '_', $_POST['search-box']);
                    } else {
                        $_SESSION['searchbox'] = $_POST['search-box'];
                    }
                    
                    
                    
                    $search = "SELECT * FROM old_occupancy WHERE $value = ?";

                    if ($stmt = $mysqli->prepare($search)) {
                        $stmt->bind_param("s", $_SESSION['searchbox']);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while ($row = $result->fetch_assoc()) {
                            $hostel = $row["hostel"];
                            $room_no = explode(' ', $row['room_no'])[1];
                            $name = $row["name"];
                            $matric_no = $row["matric_no"];
                            $date_allocated = $row["date_allocated"];
                            $date_sign_out = $row["date_sign_out"];
        
                            echo '<tr> 
                                    <td>'.$hostel.'</td> 
                                    <td>'.$room_no.'</td> 
                                    <td>'.$name.'</td> 
                                    <td>'.$matric_no.'</td> 
                                    <td>'.$date_allocated.'</td> 
                                    <td>'.$date_sign_out.'</td> 
                                </tr>';
                        }
                        $result->free();
                    }
        


                }
            }

