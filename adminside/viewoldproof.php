<?php
include 'connectMySQLi.php';

if (isset($_GET['matric_no'])) {
    $matric_no = $_GET['matric_no'];

    $sql = "SELECT proof FROM oldpop WHERE matric_no = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $matric_no);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // var_dump($row);
        // var_dump($matric_no);
        $img = $row['proof'];

        if (empty($img)){
            echo "No image found";
        }

        // Determine the image type based on the content
        $imageType = 'jpeg';
        if (strpos($img, '/png') !== false) {
            $imageType = 'png';
        } elseif (strpos($img, '/jpg') !== false) {
            $imageType = 'jpg';
        }

        // Create the data URI for the image
        $dataURI = 'data:image/' . $imageType . ';base64,' . base64_encode($img);

        // Display the image
        $image= '<img src="' . $dataURI . '" alt="Proof">';
        // var_dump($imageType);
    }
}
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>View Proof</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>
<body style="background-color: black; color: white;">
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <?php echo $image ?>
    </div>
    <script src="" async defer></script>
</body>
</html>
