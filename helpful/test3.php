<?php
    include 'studentdetailsMySQLi.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}
    $room_no = "Derin";
    $matric_no = '200502080';
    $name = 'Derin';

    $tableNames =[];

    $gender = 'Female';


    if ($gender === 'Female') {

        $query = "SELECT hostel, no_of_rooms, room_type FROM girls_special";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $tableNames[] = $row["hostel"];
            var_dump($tableNames);
        }
    

        echo '<p style="font-weight: bold;">Girl\'s Special Hostels</p>';

        echo '<table class="table table-bordered noprint" border="2" cell cellspacing="15" cellpadding="5" width="1000"> 
            <thead class="thead-light"> 
                <th> <font face="Arial">Hostel Name</font> </th> 
                <th> <font face="Arial">Number of Rooms</font> </th> 
                <th> <font face="Arial">Room Type</font> </th> 
                <th> <font face="Arial">Maximum Capacity</font> </th> 
                <th> <font face="Arial">Occupant</font> </th> 
                <th> <font face="Arial">Remark</font> </th> 
                <th> <font face="Arial">Request</font> </th> 

            </thead>';

            if (empty($tableNames)) {
                echo 'No special hostels found.';
            } else{
                foreach ($tableNames as $tableName) {
                    $available = "INSERT INTO $tableName (room_no, matric_no name) 
                    SELECT $room_no, $matric_no, $name";
                    $availableResult = $conn->query($available);
                    if ($availableResult) {
                        while ($row = mysqli_fetch_assoc($availableResult)) {
                            $hostel = $row["hostel"];
                            $no_of_rooms = $row["no_of_rooms"];
                            $room_type = $row["room_type"];
                            $max_capacity = $row["max_capacity"];
                            $occupant = $row["occupant"]; 
                            $remark = $row["remark"]; 

                            echo '<tr> 
                                    <td>'.$hostel.'</td> 
                                    <td>'.$no_of_rooms.'</td> 
                                    <td>'.$room_type.'</td> 
                                    <td>'.$max_capacity.'</td> 
                                    <td>'.$occupant.'</td> 
                                    <td>'.$remark.'</td> 
                                </tr>';
                              
                        }
                        $result->free();
                    } else{
                        echo 'No free rooms';
                        break;
                    }
                    
                }
            }
        echo '</table></br></br>';   
        }
?>



