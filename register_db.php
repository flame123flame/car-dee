<?php 
    session_start();
    include('server.php');
    
    $errors = array();

    if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $cid = mysqli_real_escape_string($conn, $_POST['cid']);
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $idline = mysqli_real_escape_string($conn, $_POST['idline']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);

        if (empty($username)) {
            array_push($errors, "Username is required");
            $_SESSION['error'] = "Username is required";
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
            $_SESSION['error'] = "Email is required";
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required");
            $_SESSION['error'] = "Password is required";
        }
        if (empty($cid)) {
            array_push($errors, "cid is required");
            $_SESSION['error'] = "cid is required";
        }
        if (empty($fname)) {
            array_push($errors, "fname is required");
            $_SESSION['error'] = "fname is required";
        }
        if (empty($lname)) {
            array_push($errors, "lname is required");
            $_SESSION['error'] = "lname is required";
        }
        if (empty($phone)) {
            array_push($errors, "phone is required");
            $_SESSION['error'] = "phone is required";
        }
        if (empty($idline)) {
            array_push($errors, "idline is required");
            $_SESSION['error'] = "idline is required";
        }
        if (empty($address)) {
            array_push($errors, "address is required");
            $_SESSION['error'] = "address is required";
        }

        

        $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists
            if ($result['username'] === $username) {
                array_push($errors, "Username already exists");
            }
            if ($result['email'] === $email) {
                array_push($errors, "Email already exists");
            }
        }

        if (count($errors) == 0) {
            $sql = "INSERT INTO user (username, email, password, cid, fname, lname, phone, idline, address) VALUES ('$username', '$email', '$password', '$cid', '$fname', '$lname', '$phone', '$idline', '$address')";
            mysqli_query($conn, $sql);

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: dashbroad.php');
        } else {
            header("location: register.php");
        }
    }

?>
