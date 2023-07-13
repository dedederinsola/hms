<?php 
require 'studentdetailsMySQLi.php';

$matric_no = $_SESSION['matric_no'];
$name = $_SESSION['name'];

// Function to assign a room to the student
function assignRoomToStudent($matric_no, $name, $conn) {
    // Fetch all available rooms based on gender and level
    $gender = $_SESSION['gender'];
    $level = $_SESSION['level'];
    

    // Define the table names array based on gender and level conditions
    $tableNames = [];

    $occupant = [];


    if ($gender === 'Male') {
        $occ = "SELECT hostel, occupant FROM boys_hostel";
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

    if ($gender === 'Female') {
        $occ = "SELECT hostel, occupant FROM girls_hostel";
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
    

    if (empty($tableNames)) {
    // Invalid gender or level
    echo "Invalid gender or level.";
    return;
    }
    
    // Loop through the table names and check if they have available rooms
    foreach ($tableNames as $tableName) {
    // Fetch all available rooms from the current table
    $sql = "SELECT sn, room_no FROM $tableName";
    $stmt = $conn->query($sql);
    $rooms = [];
    while ($row = $stmt->fetch_assoc()) {
        $rooms[] = $row;
    }
    // Loop through the rooms and check if they are empty
    foreach ($rooms as $room) {
        $sn = $room['sn'];
        $room_no = $room['room_no'];

        // Check if the room is empty by verifying if a student is assigned to it
        $sql = "SELECT * FROM $tableName WHERE sn = :sn AND matric_no IS NULL AND name IS NULL";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':sn', $sn);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Room is empty, assign the student to this room
            $updateSql = "UPDATE $tableName SET matric_no = :matric_no, name = :name WHERE sn = :sn";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bindParam(':matric_no', $matric_no);
            $updateStmt->bindParam(':name', $name);
            $updateStmt->bindParam(':sn', $sn);
            $updateStmt->execute();

            // Set session variables
            $_SESSION['room_no'] = $room_no;
            $_SESSION['name'] = $name;

            // Return the concatenation of table name with room number
            return "$tableName" . ' '. $room_no;
        }
    }

    // If the loop completes without assigning a room, it means all rooms are full
    echo "All rooms are full.";

    // Terminate the script after processing one room
    exit();
    }
}
// Check if the student already has a room assigned
$sql = "SELECT room_no FROM students WHERE matric_no = ?";
$stmt = mysqli_prepare($conn, $query);
    if (!$stmt) {
        die('Error in preparing the statement: ' . mysqli_error($conn));

    }
    mysqli_stmt_bind_param($stmt, 's', $matric_no);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $room_no = NULL;
    while ($row = mysqli_fetch_assoc($result)){
        $room_no = $row['room_no'];
    }
    if ($room_no === null) {
        // Assign a room
        $assigned_room = assignRoomToStudent($matric_no, $name, $conn);
        if ($assigned_room) {
            // Room successfully assigned
            $message = "Room assigned: $assigned_room";
        } else {
            // Failed to assign a room
            $message = "Failed to assign a room. All rooms are full.";
        }
    } else {
        // Student already has a room assigned
        $assigned_room = $room_no;
        $message = $assigned_room;
    }
?>