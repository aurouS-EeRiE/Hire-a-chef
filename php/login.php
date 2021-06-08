<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'hire') or die($mysqli->error);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        $person = $mysqli->real_escape_string($_POST['admin_chef']);
        if ($person == "admin") {
            $username = $mysqli->escape_string($_POST['login_username']);
            echo '<script>console.log(User: '.$username.')</script>';
            $_SESSION['username'] = $username;
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
            $result = $mysqli->query("SELECT * FROM admins WHERE username = '$username'");
            if ($result->num_rows == 0) {
                echo '<script>alert("User does not exists!");
                window.location.href="../home.php";</script>';
            }
            else {
                $user = $result->fetch_assoc();
                if (md5($_POST['login_password']) == $user['password']) {
                    $username = $mysqli->escape_string($_POST['login_username']);
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['username'] = $username;
                    $_SESSION['logged_in'] = true;
                    echo '<script>alert("Logged in!");
                    window.location.href="../admin.php";</script>';
                } else {
                    echo '<script>alert("You have entered wrong password, try again!");
                    window.location.href="../home.php";</script>';
                }
            }
        }
        else {
            $username = $mysqli->escape_string($_POST['login_username']);
            $_SESSION['username'] = $username;
            echo '<script>console.log(User: '.$username.')</script>';
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
            $result = $mysqli->query("SELECT * FROM chefs WHERE username = '$username'");
            if ($result->num_rows == 0) {
                echo '<script>alert("User does not exists!");
                window.location.href="../home.php";</script>';
            }
            else {
                $user = $result->fetch_assoc();
                if (md5($_POST['login_password']) == $user['password']) {
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['username'] = $username;
                    $_SESSION['logged_in'] = true;
                    echo '<script>alert("Logged in!");
                    window.location.href="../chef.php";</script>';
                } else {
                    session_unset();
                    session_destroy();
                    echo '<script>alert("You have entered wrong password, try again!");
                    window.location.href="../home.php";</script>';
                }
            }

        }
    } else {
        echo '<script>alert("Passwords did not match!");
        window.location.href="../home.php";</script>';
    }

}

?>