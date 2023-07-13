<?php
	session_start();

		//get POST data
		$old = $_POST['old_password'];
		$new = $_POST['new_password'];
		$matric_no = $_POST['matric_no'];

    //create a session for the data incase error occurs
		$_SESSION['old'] = $old;
		$_SESSION['new'] = $new;
		$_SESSION['matric_no'] = $matric_no;
 
		//connection
		$conn = new mysqli('localhost', 'root', '', 'crawford_uni');
 
        $sql = "SELECT * FROM login_credentials WHERE matric_no= ?";
        $statement = $conn->prepare($sql);
        $statement->bind_param('i', $_SESSION["matric_no"]);
        $statement->execute();
        $result = $statement->get_result();
        $row = $result->fetch_assoc();

        if (! empty($row)) {
            $hashedPassword = $row["password"];
            $password = PASSWORD_HASH($_POST["new_password"], PASSWORD_DEFAULT);
            if (password_verify($_POST["old_password"], $hashedPassword)) {
                $sql = "UPDATE login_credentials set password=? WHERE matric_no=?";
                $statement = $conn->prepare($sql);
                $statement->bind_param('si', $password, $_SESSION["matric_no"]);
                $statement->execute();
                $message = "Password Changed";
            } else
                $message = "Current Password is not correct";
        }
    ?>