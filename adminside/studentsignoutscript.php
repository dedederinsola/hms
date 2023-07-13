<?php 
        $user = "root"; 
        $password = ""; 
        $database = "crawford_uni"; 
        $mysqli = new mysqli("localhost", $user, $password, $database); 
        $query = "SELECT * FROM students";


        echo '<table border="2" cell cellspacing="15" cellpadding="5" width="1000"> 
            <tr> 
                <th> <font face="Arial">Name</font> </th> 
                <th> <font face="Arial">Matric Number</font> </th> 
                <th> <font face="Arial">Date of Birth</font> </th> 
                <th> <font face="Arial">Gender</font> </th> 
                <th> <font face="Arial">Level</font> </th> 
                <th> <font face="Arial">Department</font> </th> 
                <th> <font face="Arial">Room</font> </th> 
                <th> <font face="Arial">Sign Out</font> </th> 
            </tr>';

        if ($result = $mysqli->query($query)) {
            while ($row = $result->fetch_assoc()) {
                $name = $row["name"];
                $matric_no = $row["matric_no"];
                $dob = $row["dob"];
                $gender = $row["gender"];
                $level = $row["level"]; 
                $dept = $row["dept"]; 
                $room_no = $row["room_no"]; 

                echo '<tr> 
                        <td>'.$name.'</td> 
                        <td>'.$matric_no.'</td> 
                        <td>'.$dob.'</td> 
                        <td>'.$gender.'</td> 
                        <td>'.$level.'</td> 
                        <td>'.$dept.'</td> 
                        <td>'.$room_no.'</td> 
                        <td>
                            <form action="actualstudentsignoutscript.php" method="POST">
                            <input type="hidden" name="matric_no" value="'.$matric_no.'">
                            <button type="submit" name="vacate">Sign Student Out</button></form>
                        </td>
                    </tr>';
            }
            $result->free();
        } 
        ?>
