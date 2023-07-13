<?php 
require 'studentdetailsPDO.php';

$matric_no = $_SESSION['matric_no'];
$name = $_SESSION['name'];

// Function to assign a room to the student
function assignRoomToStudent($matric_no, $name, $conn) {
    // Fetch all available rooms based on gender and level
    $gender = $_SESSION['gender'];
    $level = $_SESSION['level'];
    

    // Define the table names array based on gender and level conditions
    $tableNames = [];

    if ($gender === 'Male') {
        if ($level === '100') {
            $sql = "SELECT hostel FROM boys_hostel WHERE occupant = '100L'";
            $stmt = $conn->query($sql);
            $results = $stmt->fetchAll(PDO::FETCH_COLUMN);
        
            foreach ($results as $hostel) {
                $tableNames[] = $hostel;
            }
        }
        if ($level === '200') {
            $sql = "SELECT hostel FROM boys_hostel WHERE occupant = '200L'";
            $stmt = $conn->query($sql);
            $results = $stmt->fetchAll(PDO::FETCH_COLUMN);
        
            foreach ($results as $hostel) {
                $tableNames[] = $hostel;
            }
        }
        if ($level === '300') {
            $sql = "SELECT hostel FROM boys_hostel WHERE occupant = '300L'";
            $stmt = $conn->query($sql);
            $results = $stmt->fetchAll(PDO::FETCH_COLUMN);
        
            foreach ($results as $hostel) {
                $tableNames[] = $hostel;
            }
        }
        if ($level === '400') {
            $sql = "SELECT hostel FROM boys_hostel WHERE occupant = '400L'";
            $stmt = $conn->query($sql);
            $results = $stmt->fetchAll(PDO::FETCH_COLUMN);
        
            foreach ($results as $hostel) {
                $tableNames[] = $hostel;
            }
        }
        if ($level === 'JUPEB') {
            $sql = "SELECT hostel FROM boys_hostel WHERE occupant = 'JUBEP'";
            $stmt = $conn->query($sql);
            $results = $stmt->fetchAll(PDO::FETCH_COLUMN);
        
            foreach ($results as $hostel) {
                $tableNames[] = $hostel;
            }
        }
        // Add more conditions for other levels if needed

    }

    if ($gender === 'Female') {
        if ($level === '100') {
            $sql = "SELECT hostel FROM girls_hostel WHERE occupant = '100L'";
            $stmt = $conn->query($sql);
            $results = $stmt->fetchAll(PDO::FETCH_COLUMN);
        
            foreach ($results as $hostel) {
                $tableNames[] = $hostel;
            }
        }


        if ($level === '200') {
            $sql = "SELECT hostel FROM girls_hostel WHERE occupant = '200L'";
            $stmt = $conn->query($sql);
            $results = $stmt->fetchAll(PDO::FETCH_COLUMN);
        
            foreach ($results as $hostel) {
                $tableNames[] = $hostel;
            }
        }


        if ($level === '300') {
            $sql = "SELECT hostel FROM girls_hostel WHERE occupant = '300L'";
            $stmt = $conn->query($sql);
            $results = $stmt->fetchAll(PDO::FETCH_COLUMN);
        
            foreach ($results as $hostel) {
                $tableNames[] = $hostel;
            }
        }


        if ($level === '400') {
            $sql = "SELECT hostel FROM girls_hostel WHERE occupant = '400L'";
            $stmt = $conn->query($sql);
            $results = $stmt->fetchAll(PDO::FETCH_COLUMN);
        
            foreach ($results as $hostel) {
                $tableNames[] = $hostel;
            }
        }
        if ($level === 'JUPEB') {
            $sql = "SELECT hostel FROM girls_hostel WHERE occupant = 'JUPEB'";
            $stmt = $conn->query($sql);
            $results = $stmt->fetchAll(PDO::FETCH_COLUMN);
        
            foreach ($results as $hostel) {
                $tableNames[] = $hostel;
            }
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
    $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
$sql = "SELECT room_no FROM students WHERE matric_no = :matric_no";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':matric_no', $matric_no);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$room_no = $result['room_no'];

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