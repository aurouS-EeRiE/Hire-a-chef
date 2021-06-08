<?php
session_start();
if (!$_SESSION['logged_in']) {
    echo '<script>window.location.href="home.php";</script>';
}
?>



<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hire</title>

    <style>
        body {
            background: linear-gradient(-45deg, #fd53b1, #be70fd, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        #welcome {
            text-align: center;
            font-size: 40px;
            width: 100%;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        #logout {
            float: right;
            padding-right: 20px;
            font-size: 20px;
            cursor: pointer;
        }
        #contact {
            color: #cc3300;
        }
        
    </style>

</head>


<body>

    <marquee behavior="scroll" direction="left" style="margin-top: 20px;" scrollamount="12">
        <img src="Assets/coffee-cup.png" width="50" height="50" alt="Natural" />
        <img src="Assets/diet.png" width="50" height="50" alt="Natural" />
        <img src="Assets/fast-food.png" width="50" height="50" alt="Natural" />
        <img src="Assets/fork.png" width="50" height="50" alt="Natural" />
        <img src="Assets/pastry-chef.png" width="50" height="50" alt="Natural" />
        <img src="Assets/fried-potatoes.png" width="50" height="50" alt="Natural" />
        <img src="Assets/ice-cream.png" width="50" height="50" alt="Natural" />
        <img src="Assets/kebab.png" width="50" height="50" alt="Natural" />
        <img src="Assets/dessert.png" width="50" height="50" alt="Natural" />
        <img src="Assets/macaron.png" width="50" height="50" alt="Natural" />

    </marquee>
    <div>
        <p style="float:left; padding-left: 20px;font-size: 20px;cursor: pointer;" id="back" onclick="back()"><u>back</u></p>

        <p id = "logout" name = "logout" onclick="logout()"><u>Logout</u></p>
        <div id="welcome">
            <div>
                <p><img src="Assets/chef.png" alt="Smiley face" width="42" height="42" style="vertical-align:middle">Have chef your way <img src="Assets/chef.png" alt="Smiley face" width="42" height="42" style="vertical-align:middle"></p>
            </div>

        </div>
    </div>

    <table id="res_table" class="res_table" name="res_table">
        <tr>
            <th>Name of the Applicant</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Phone number</th>
            <th>Email ID</th>
            <th>Experience</th>
            <th>Specialization</th>
            <th>Timings</th>
            <th>Career choice</th>
            <th>Cooking to you is...</th>
            <th>Restaurant Name</th>
            <th>Status</th>
        </tr>
        <?php
        $mysqli = new mysqli('localhost', 'root', '', 'hire') or die($mysqli->error);
        $username = $_SESSION['username'];
        $sql = "SELECT restaurant_name FROM `register` WHERE username = '$username'";
        $results = $mysqli->query($sql) or die($mysqli->error);

        if ($results->num_rows > 0) {
            while ($rows = $results->fetch_assoc()) {
                $restaurant = $rows['restaurant_name'];
                $sql = "SELECT * FROM `apply` WHERE restaurant = '$restaurant'";
                $result = $mysqli->query($sql) or die($mysqli->error);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $mail = $row["email"];
                        echo "<tr><td>" . $row["name"] . "</td><td>" . $row["age"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["email"] . "</td><td>" . $row["experience"] . "</td><td>" . $row["dish"] . "</td><td>" . $row["time"] . "</td><td>" . $row["option"] . "</td><td>" . $row["food"] . "</td><td>" . $restaurant . "</td><td><a href='mailto:$mail?subject=Regarding application' id = 'contact'>Contact</a></td></tr>";
                    }
                }
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $mysqli->close();
        ?>
    </table>

    <script>
        function back() {
            window.location.href = "admin.php";
        }

        var x = document.getElementById("select");
        x.onclick = function() {
            
        };

        function logout() {
            window.location.href = "logout.php";
        }
    </script>




</body>

</html>