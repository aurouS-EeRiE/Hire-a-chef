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
            float:right;
            padding-right: 20px;
            font-size: 20px;
            cursor: pointer;
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
    <p id = "logout" name = "logout" onclick="logout()"><u>Logout</u></p>
        <div id="welcome">
            <div>
                
                <p><img src="Assets/chef.png" alt="Smiley face" width="42" height="42"
                        style="vertical-align:middle">Have chef your way <img src="Assets/chef.png" alt="Smiley face"
                        width="42" height="42" style="vertical-align:middle"></p>
            </div>

        </div>
    </div>

    <table id = "res_table" class = "res_table" name = "res_table">
        <tr>
            <th>Restaurant name</th>
            <th>Cusine</th>
            <th>Job openings</th>
            <th>Address</th>
            <th>Experience</th>
            <th>Timings</th>
            <th>Information</th>
            <th>Apply now</th>
        </tr>
        <?php
        $mysqli = new mysqli('localhost', 'root', '', 'hire') or die($mysqli->error);
        $sql = "SELECT * FROM register";
        $result = $mysqli->query($sql);

        if($result -> num_rows >0) {
            while($row = $result->fetch_assoc()) {
                $username = $_SESSION['username'];
                $contain = "SELECT restaurant,username FROM apply WHERE restaurant = '".$row['restaurant_name']."' AND username ='".$username."'";
                $result_contain = $mysqli->query($contain);
                if($result_contain -> num_rows > 0) {
                    echo "<tr style = 'cursor:pointer;'><td>".$row["restaurant_name"]."</td><td>".$row["restaurant_cusine"]."</td><td>".$row["no_of_openings"]."</td><td>".$row["address"]."</td><td>".$row["experience"]."</td><td>".$row["timing"]."</td><td>".$row["info"]."</td><td>Applied</td></tr>";
                } else {
                    $name = str_replace(" ", "_", $row['restaurant_name']);
                    echo "<tr id='".$name."' onclick = redirect(this.id) style = 'cursor:pointer;'><td>".$row["restaurant_name"]."</td><td>".$row["restaurant_cusine"]."</td><td>".$row["no_of_openings"]."</td><td>".$row["address"]."</td><td>".$row["experience"]."</td><td>".$row["timing"]."</td><td>".$row["info"]."</td><td>Apply</td></tr>";
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
        function redirect(name) {
            window.location.href = "application.php?name=" + name;
        }
        
        function logout() {
            window.location.href = "logout.php";
        }
    </script>




</body>

</html>