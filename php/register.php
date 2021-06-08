<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'hire') or die($mysqli->error);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register_button'])) {
        $username = $_SESSION['username'];
        $mysqli->query("SELECT username from admins where username = '$username'");
        $rname = $mysqli->real_escape_string($_POST['rname']);
        $rcusine = $mysqli->real_escape_string($_POST['rcusine']);
        $ropen = $mysqli->real_escape_string($_POST['ropen']);
        $raddress = $mysqli->real_escape_string($_POST['raddress']);
        $rexp = $mysqli->escape_string($_POST['rexp']);
        $rtime = $mysqli->escape_string($_POST['rtime']);
        $rinfo = $mysqli->real_escape_string($_POST['rinfo']);


        $mysqli->query(
            "CREATE TABLE IF NOT EXISTS `register`
            (
                `sno` int(11) NOT NULL AUTO_INCREMENT,
                `restaurant_name` varchar(40) NOT NULL,
                `restaurant_cusine` varchar(100) NOT NULL,
                `no_of_openings` INT NOT NULL,
                `address` varchar(100) NOT NULL,
                `experience` varchar(20) NOT NULL,
                `timing` varchar(20) NOT NULL,
                `info` varchar(100),
                `username` varchar(100),
                PRIMARY KEY (`sno`)
            )DEFAULT CHARSET = utf8;"
        ) or die('MySQL Error: ' . mysqli_error($mysqli) . ' (' . mysqli_errno($mysqli) . ')');
        $result = $mysqli->query("SELECT * FROM register WHERE restaurant_name = '$rname'") or die($mysqli->error);
        if ($result->num_rows > 0) {
            echo '<script>alert("Restaurant already registered!");
            window.location.href="../register.php";</script>';
        } else {
            $sql = "INSERT INTO register(restaurant_name, restaurant_cusine, no_of_openings, address, experience, timing, info, username) VALUES ('$rname', '$rcusine', '$ropen', '$raddress', '$rexp', '$rtime', '$rinfo', '$username' )";
            if ($mysqli->query($sql) or die('MySQL Error: ' . mysqli_error($mysqli) . ' (' . mysqli_errno($mysqli) . ')')) {
                $_SESSION['logged_in'] = true;
                echo '<script>alert("Successfully Registered the restaurant!");
                window.location.href="../admin.php";</script>';
            } else {
                echo '<script>alert("Registration failed!");
                window.location.href="../admin.php";</script>';
            }
        }   

                
        
    } 

}