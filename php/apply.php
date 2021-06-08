<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'hire') or die($mysqli->error);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['apply_button'])) {
        $username = $_SESSION['username'];
        $mysqli->query("SELECT username from chefs where username = '$username'");
        $cname = $mysqli->real_escape_string($_POST['cname']);
        $cage = $mysqli->real_escape_string($_POST['cage']);
        $cgender = $mysqli->real_escape_string($_POST['male_female']);
        $cphone = $mysqli->real_escape_string($_POST['cphone']);
        $cemail = $mysqli->real_escape_string($_POST['cemail']);
        $cexp = $mysqli->real_escape_string($_POST['cexp']);
        $cdish = $mysqli->real_escape_string($_POST['cdish']);
        $ctime = $mysqli->real_escape_string($_POST['ctime']);
        $copt = $mysqli->real_escape_string($_POST['copt']);
        $cfood = $mysqli->real_escape_string($_POST['cfood']);
        $names = $mysqli->real_escape_string($_POST['name']);
        $name = str_replace("_", " ", $names);

        $mysqli->query(
            "CREATE TABLE IF NOT EXISTS `apply`
            (
                `sno` int(11) NOT NULL AUTO_INCREMENT,
                `name` varchar(40) NOT NULL,
                `age` INT NOT NULL,
                `gender` varchar(10) NOT NULL,
                `phone` varchar(10) NOT NULL,
                `email` varchar(40) NOT NULL,
                `experience` varchar(200) NOT NULL,
                `dish` varchar(100) NOT NULL,
                `time` varchar(100) NOT NULL,
                `option` varchar(100) NOT NULL,
                `food` varchar(100) NOT NULL,
                `username` varchar(100) NOT NULL,
                `restaurant` varchar(100) NOT NULL,
                PRIMARY KEY (`sno`)
            )DEFAULT CHARSET = utf8;"
        ) or die('MySQL Error: ' . mysqli_error($mysqli) . ' (' . mysqli_errno($mysqli) . ')');
        $sql = "INSERT INTO apply(name, age, gender, phone, email, experience, dish, time, option, food, username, restaurant) VALUES ('$cname', '$cage', '$cgender', '$cphone', '$cemail', '$cexp', '$cdish', '$ctime', '$copt', '$cfood', '$username', '$name')";
        if ($mysqli->query($sql) or die('MySQL Error: ' . mysqli_error($mysqli) . ' (' . mysqli_errno($mysqli) . ')')) {
            echo '<script>alert("Successfully submited the application");
            window.location.href="../chef.php";</script>';
        } else {
            echo '<script>alert("application failed!");
            window.location.href="../chef.php";</script>';
        }              
        
    } 

}