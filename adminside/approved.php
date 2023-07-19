<?php

require 'connectMySQLi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (isset($_POST['approve'])) {
        $matric_no = $_POST['matric_no'];
        $name = $_POST['name'];
        $hostel = $_POST['hostel'];

        var_dump($matric_no, $name);

        // if (isset($_POST['hostel']) && isset($_POST['room_no'])) {
        $sql = "UPDATE p_o_p SET approved = 'yes' WHERE matric_no = $matric_no";



        if ($conn->query($sql) === TRUE) {
            header('Location: roomrequests.php');

        } else {
            echo 'why not:';
        }
    }


    if (isset($_POST['deny'])) {
        $matric_no = $_POST['matric_no'];
        $name = $_POST['name'];
        $hostel = $_POST['hostel'];

        // if (isset($_POST['hostel']) && isset($_POST['room_no'])) {
        $sql = "UPDATE p_o_p SET approved = 'no' WHERE matric_no = $matric_no";

        if ($conn->query($sql) === TRUE){
            header('Location: roomrequests.php');

        }
    }
}
 

// else {
//     die ('Error executing query :' . $conn->errorInfo()[2] );

// }

// Close the database connection
$conn->close();

?>