<?php

require 'connectMySQLi.php';

$matric_no = $_POST['matric_no'];
$name = $_POST['name'];
$parts = explode(' ', $_POST['hostel']);
$hostel = $parts[0];
$room_no = $parts[1];



if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (isset($_POST['approve'])) {

        // if (isset($_POST['hostel']) && isset($_POST['room_no'])) {
        $sql = "UPDATE oldpop SET approved = 'yes' WHERE matric_no = $matric_no";



        if ($conn->query($sql) === TRUE) {
            header('Location: roomrequests.php');

        } else {
            echo 'why not:';
            echo 'Query execution failed: ' . $conn->error;
            var_dump($matric_no, $name);
        }
    }


    if (isset($_POST['deny'])) {

        // if (isset($_POST['hostel']) && isset($_POST['room_no'])) {
        $sql = "UPDATE oldpop SET approved = 'no' WHERE matric_no = $matric_no";

        if ($conn->query($sql) === TRUE){
            header('Location: roomrequests.php');

        } else {
            echo 'please nau';
            echo 'Query execution failed: ' . $conn->error;

            var_dump($matric_no, $name);

        }
    }
}
 

// else {
//     die ('Error executing query :' . $conn->errorInfo()[2] );

// }

// Close the database connection
$conn->close();

?>