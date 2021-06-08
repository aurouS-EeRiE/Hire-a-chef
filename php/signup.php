<?php

$mysqli = new mysqli('localhost', 'root', '', 'hire') or die($mysqli->error);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['signup'])) {
        $person = $mysqli->real_escape_string($_POST['admin_chef']);
        $username = $mysqli->real_escape_string($_POST['signup_username']);
        $email = $mysqli->real_escape_string($_POST['signup_email']);
        $password = $mysqli->escape_string($_POST['signup_password1']);
        if ($person == "admin") {
            if ($_POST['signup_password1'] == $_POST['signup_password2']) {
                $password = $mysqli->escape_string(md5($_POST['signup_password1']));
                $mysqli->query(
                    "CREATE TABLE IF NOT EXISTS `admins`
                    (
                        `sno` int(11) NOT NULL AUTO_INCREMENT,
                        `username` varchar(40) NOT NULL,
                        `email` varchar(100) NOT NULL,
                        `password` varchar(100) NOT NULL,
                        PRIMARY KEY (`sno`)
                    )DEFAULT CHARSET = utf8;"
                ) or die('MySQL Error: ' . mysqli_error($mysqli) . ' (' . mysqli_errno($mysqli) . ')');
                $result = $mysqli->query("SELECT * FROM admins WHERE email = '$email'") or die($mysqli->error);
                if ($result->num_rows > 0) {
                    echo '<script>alert("User already exists!");
                    window.location.href="../home.php";</script>';
                } else {
                    $sql = "INSERT INTO admins(username, email, password) VALUES ('$username', '$email', '$password')";
                    if ($mysqli->query($sql) or die('MySQL Error: ' . mysqli_error($mysqli) . ' (' . mysqli_errno($mysqli) . ')')) {
                        $_SESSION['logged_in'] = true;
                        echo '<script>alert("Successfully Registered as admin! Please login to continue!");
                        window.location.href="../home.php";</script>';
                    } else {
                        echo '<script>alert("Registration failed!");
                        window.location.href="../home.php";</script>';
                    }
                }

            } else {
                echo '<script>alert("Registration failed!");
                window.location.href="../home.php";</script>';
            }
            
        } else {
            if ($_POST['signup_password1'] == $_POST['signup_password2']) {
                $password = $mysqli->escape_string(md5($_POST['signup_password1']));
                $mysqli->query(
                    "CREATE TABLE IF NOT EXISTS `chefs`
                    (
                        `sno` int(11) NOT NULL AUTO_INCREMENT,
                        `username` varchar(40) NOT NULL,
                        `email` varchar(100) NOT NULL,
                        `password` varchar(100) NOT NULL,
                        PRIMARY KEY (`sno`)
                    )DEFAULT CHARSET = utf8;"
                ) or die('MySQL Error: ' . mysqli_error($mysqli) . ' (' . mysqli_errno($mysqli) . ')');
                $result = $mysqli->query("SELECT * FROM chefs WHERE email = '$email'") or die($mysqli->error);
                if ($result->num_rows > 0) {
                    echo '<script>alert("User already exists!");
                    window.location.href="../home.php";</script>';
                } else {
                    $sql = "INSERT INTO chefs(username, email, password) VALUES ('$username', '$email', '$password')";
                    if ($mysqli->query($sql) or die('MySQL Error: ' . mysqli_error($mysqli) . ' (' . mysqli_errno($mysqli) . ')')) {
                        $_SESSION['logged_in'] = true;
                        echo '<script>alert("Successfully Registered as chef! Please login to continue!");
                        window.location.href="../home.php";</script>';
                    } else {
                        echo '<script>alert("Registration failed!");
                        window.location.href="../home.php";</script>';
                    }
                }

            } else {
                echo '<script>alert("Registration failed!");
                window.location.href="../home.php";</script>';
            }

        }
    } 

}