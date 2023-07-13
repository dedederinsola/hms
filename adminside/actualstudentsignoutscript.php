<?php 
require 'connectMySQLi.php'; 

$name = NULL;
$level = NULL;
$gender = NULL;
$matric_no = NULL;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the matriculation number is present
    if (isset($_POST['matric_no']) && !empty($_POST['matric_no'])) {

        $matric_no = $_POST['matric_no'];

        //Select the record where matric_no is the same as the one submitted, using a prepared statement
        $query = "SELECT * FROM students WHERE matric_no = ?";
        $stmt = mysqli_prepare($conn, $query);
        if (!$stmt) {
            die('Error in preparing the statement: ' . mysqli_error($conn));
          }
        mysqli_stmt_bind_param($stmt, 's', $matric_no);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // if it is successful, store some of the attributes in variable names
        if ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
            $level = $row['level'];
            $gender = $row['gender'];
            $vacate = vacateStudentFromRoom($matric_no, $name, $gender, $level, $conn);

        }
        // var_dump($gender, $level, $name, $matric_no);
        include("adminsignout.php");
    }

    
}


// Function to vacate a student from a room
function vacateStudentFromRoom($matric_no, $name, $gender, $level, $conn) {
    
    // Define the table names array based on gender and level conditions

    
    $tableNames = [];
    $occupant = [];



    if ($gender === 'Male') {
        $occ = "SELECT hostel, occupant FROM boys_hostel
                UNION
                SELECT hostel, occupant FROM boys_special";
        $occcol = $conn->query($occ);
        if ($occcol) {
            while ($cell = $occcol->fetch_assoc()) {
                $hostel = $cell["hostel"];
                $occupants = explode(", ", $cell["occupant"]);
                $occupant[$hostel] = $occupants;
                }
    
            if ($level === '100') {
                foreach ($occupant as $hostel => $occupants) {
                    if (in_array('100L', $occupants)) {
                        $tableNames[] = $hostel;
                    }
                }                    
            }
            if ($level === '200') {
                foreach ($occupant as $hostel => $occupants) {
                    if (in_array('200L', $occupants)) {
                        $tableNames[] = $hostel;
                    }
                }                    
            }
            if ($level === '300') {
                foreach ($occupant as $hostel => $occupants) {
                    if (in_array('300L', $occupants)) {
                        $tableNames[] = $hostel;
                    }
                }                    
            }
            if ($level === '400') {
                foreach ($occupant as $hostel => $occupants) {
                    if (in_array('400L', $occupants)) {
                        $tableNames[] = $hostel;
                    }
                }                    
            }
            if ($level === 'JUPEB') {
                foreach ($occupant as $hostel => $occupants) {
                    if (in_array('JUPEB', $occupants)) {
                        $tableNames[] = $hostel;
                    }
                }                    
            }

        } else {
            die('Error executing query: ' . $conn->error);
        }

        // Add more conditions for other levels if needed
        // echo $gender;
    }

    elseif ($gender === 'Female') {
        $occ = "SELECT hostel, occupant FROM girls_special
                UNION
                SELECT hostel, occupant FROM girls_hostel";
        $occcol = $conn->query($occ);
        if ($occcol) {
            while ($cell = $occcol->fetch_assoc()) {
                $hostel = $cell["hostel"];
                $occupants = explode(", ", $cell["occupant"]);
                $occupant[$hostel] = $occupants;
                }

            if ($level === '100') {
                foreach ($occupant as $hostel => $occupants) {
                    if (in_array('100L', $occupants)) {
                        $tableNames[] = $hostel;
                    }
                } 
            }


            if ($level === '200') {
                foreach ($occupant as $hostel => $occupants) {
                    if (in_array('200L', $occupants)) {
                        $tableNames[] = $hostel;
                    }
                } 
            }


            if ($level === '300') {
                foreach ($occupant as $hostel => $occupants) {
                    if (in_array('300L', $occupants)) {
                        $tableNames[] = $hostel;
                    }
                } 
            }


            if ($level === '400') {
                foreach ($occupant as $hostel => $occupants) {
                    if (in_array('400L', $occupants)) {
                        $tableNames[] = $hostel;
                    }
                } 
            }

            if ($level === 'JUPEB') {
                foreach ($occupant as $hostel => $occupants) {
                    if (in_array('JUPEB', $occupants)) {
                        $tableNames[] = $hostel;
                    }
                } 
            }
        } else {
            die('Error executing query: ' . $conn->error);
        }   
        // Add more conditions for other levels if needed

    }

    // else{
    //     echo 'What is your gender?';
    // }
    

    if (empty($tableNames)) {
    // Invalid gender or level
    echo "Invalid gender or level.";
    // echo $matric_no;
    return;
    }

    // Loop through each table
    foreach ($tableNames as $tableName) {
    // Prepare the SQL statement
        $sql = "UPDATE $tableName SET matric_no = NULL, name = NULL WHERE matric_no = $matric_no";
        
        // Execute the SQL statement
        if ($conn->query($sql) === TRUE) {
            $message = "Student has vacated $tableName\n";
        } else {
            $message = "Error updating records in $tableName: " . $conn->errorInfo()[2] . "\n";
        }
    }
    return $message; // Return the messages
}




    
?>