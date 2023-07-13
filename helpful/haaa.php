echo '<p>Girl\'s Standard Hostels</p></br>';

echo '<table border="2" cell cellspacing="15" cellpadding="5" width="1000"> 
    <tr> 
        <th> <font face="Arial">Hostel Name</font> </th> 
        <th> <font face="Arial">Number of Rooms</font> </th> 
        <th> <font face="Arial">Room Type</font> </th> 
        <th> <font face="Arial">Maximum Capacity</font> </th> 
        <th> <font face="Arial">Occupant</font> </th> 
        <th> <font face="Arial">Remark</font> </th> 
    </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
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
}
echo '</table></br></br>';

echo '<p>Girl\'s Special Hostels</p>';

echo '<table border="2" cell cellspacing="15" cellpadding="5" width="1000"> 
    <tr> 
        <th> <font face="Arial">Hostel Name</font> </th> 
        <th> <font face="Arial">Number of Rooms</font> </th> 
        <th> <font face="Arial">Room Type</font> </th> 
        <th> <font face="Arial">Maximum Capacity</font> </th> 
        <th> <font face="Arial">Occupant</font> </th> 
        <th> <font face="Arial">Remark</font> </th> 
    </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
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
} 
echo '</table></br></br>';

echo '<p>Boy\'s Standard Hostels</p>';

echo '<table border="2" cell cellspacing="15" cellpadding="5" width="1000"> 
    <tr> 
        <th> <font face="Arial">Hostel Name</font> </th> 
        <th> <font face="Arial">Number of Rooms</font> </th> 
        <th> <font face="Arial">Room Type</font> </th> 
        <th> <font face="Arial">Maximum Capacity</font> </th> 
        <th> <font face="Arial">Occupant</font> </th> 
        <th> <font face="Arial">Remark</font> </th> 
    </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
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
} 
echo '</table></br></br>';

echo '<p>Boy\'s Special Hostels</p>';

echo '<table border="2" cell cellspacing="15" cellpadding="5" width="1000"> 
    <tr> 
        <th> <font face="Arial">Hostel Name</font> </th> 
        <th> <font face="Arial">Number of Rooms</font> </th> 
        <th> <font face="Arial">Room Type</font> </th> 
        <th> <font face="Arial">Maximum Capacity</font> </th> 
        <th> <font face="Arial">Occupant</font> </th> 
        <th> <font face="Arial">Remark</font> </th> 
    </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
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
} 
echo '</table></br></br>';
