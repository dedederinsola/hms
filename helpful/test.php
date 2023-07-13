<?php 
require 'studentdetailsMySQLi.php';

    //Part of the dynamic room table generation
    $room = 1;
    $tableNames = [];
    $query = "SELECT * FROM boys_hostel";
    $hostels = $conn->query($query);
    if($hostels) {
        while ($row = $hostels->fetch_assoc()) {
            $tableNames[] = $row["hostel"];
        }
        foreach ($tableNames as $tableName) {
            


        }
    }  else {
        die('Error executing query: ' . $conn->error);
    }
    $gender= "Female";

    //Part of the dynamic room table generation
    $occupant = [];


    if ($gender === 'Female') {
        $occ = "SELECT hostel, occupant FROM boys_hostel
        UNION
        SELECT hostel, occupant FROM girls_hostel";
        $occcol = $conn->query($occ);
        // if ($occcol) {
        //     while ($cell = $occcol->fetch_assoc()) {
        //         $hostel = $cell["hostel"];
        //         $occupants = explode(", ", $cell["occupant"]);
        //         $occupant[$hostel] = $occupants;
        //     }
            
        //     foreach ($occupant as $hostel => $occupants) {
        //         if (in_array('100L', $occupants)) {
        //             $tableNames[] = $hostel;
        //             echo $hostel."</br>";
        //         }
        //     } 
        //     echo "</br></br>";  
        //     foreach ($tableNames as $tableName) {
        //         echo $tableName. "</br>" ;
        //     }
        // }

        if ($occcol) {
            while ($cell = $occcol->fetch_assoc()) {
                $hostel = $cell["hostel"];
                $occupants = explode(", ", $cell["occupant"]);
                $occupant[$hostel] = $occupants;
            }

            foreach ($occupant as $hostel => $occupants) {
                foreach ($occupants as $occupant) {
                    echo $hostel . ": " . $occupant . "<br>";
                }
            }
            echo "<br>";
        }
            
            // foreach ($occupant as $hostel => $occupants) {
            //     echo "Hostel: " . $hostel . "<br>";
            //     foreach ($occupants as $occupant) {
            //         echo "Occupant: " . $occupant . "<br>";
            //         // break;
            //     }
            //     echo "<br>";
            // }
    //      else {
    //     die('Error executing query: ' . $conn->error);
    // }
    // foreach ($tableNames as $tableName) {
    //     echo $tableName. "</br>" ;
    // }
    }


?>