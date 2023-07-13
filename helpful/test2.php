<?php 
include 'connectMySQLi.php';

$level = '200L';

$tableNames = [];

$gender = 'Female';

if ($gender === 'Female') {
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
                    if (in_array('100L', $occupants) || in_array('ANY', $occupants)) {
                        if (!in_array($hostel, $tableNames)) {
                            $tableNames[] = $hostel;
                        }
                    }                
                } 
            }


            if ($level === '200') {
                foreach ($occupant as $hostel => $occupants) {
                    if (in_array('200L', $occupants) && !in_array($hostel, $tableNames)) {
                        $tableNames[] = $hostel;
                    }
                } 
            }


            if ($level === '300') {
                foreach ($occupant as $hostel => $occupants) {
                    if (in_array('300L', $occupants) && !in_array($hostel, $tableNames)) {
                        $tableNames[] = $hostel;
                    }
                } 
            }


            if ($level === '400') {
                foreach ($occupant as $hostel => $occupants) {
                    if (in_array('400L', $occupants) && !in_array($hostel, $tableNames)) {
                        $tableNames[] = $hostel;
                    }
                } 
            }

            if ($level === 'JUPEB') {
                foreach ($occupant as $hostel => $occupants) {
                    if (in_array('JUPEB', $occupants) && !in_array($hostel, $tableNames)) {
                        $tableNames[] = $hostel;
                    }
                } 
            }

            if (empty($tableNames)){
                echo'There are no tables here';
            }
            
        } else {
            die('Error executing query: ' . $conn->error);
        }  
        
        foreach ($tableNames as $table) {
            echo $table;
        }
        // Add more conditions for other levels if needed

    }
?>