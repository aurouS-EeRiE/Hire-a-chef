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

        #register_button {
            background-color: #000000;
            color: white;
            padding: 15px 32px;
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
            border-radius: 15px;
        }

        #logout {
            float: right;
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
        <p style="float:left; padding-left: 20px;font-size: 20px;cursor: pointer;" id="back" onclick="back()"><u>back</u></p>
        <p id="logout" name="logout" onclick="logout()"><u>Logout</u></p>
        <div id="welcome">
            <div>
                <p><img src="Assets/chef.png" alt="Smiley face" width="42" height="42" style="vertical-align:middle">Have chef your way <img src="Assets/chef.png" alt="Smiley face" width="42" height="42" style="vertical-align:middle"></p>
            </div>
        </div>
    </div>

    <div style="text-align: center; font-size: 25px; padding: 30px;">
        <form action="php/register.php" method="POST" style=" border-style: double; padding: 20px;" name="register_form">
            <label for="rname">Restaurant Name</label>
            <input type="text" id="rname" name="rname"><br><br>
            <label for="rcusine">Restaurant Cusine</label>
            <input type="text" id="rcusine" name="rcusine"><br><br>
            <label for="ropen">Number of openings</label>
            <input type="number" id="ropen" name="ropen"><br><br>
            <label for="raddress">Address</label>
            <input type="text" id="raddress" name="raddress"><br><br>
            <label for="rexp">Experience Required</label>
            <select name="rexp" id="rexp">
                <option value="fresher">Fresher</option>
                <option value="6 months to 1 year">6 months - 1 year</option>
                <option value="1 year to 2 years">1 year - 2 years</option>
                <option value="2 years or more">2 years and above</option>
            </select><br><br>
            <label for="rtime">Timing</label>
            <select name="rtime" id="rtime">
                <option value="fulltime">Full time</option>
                <option value="parttime">Part time</option>
                <option value="full time or part time">Both</option>
            </select><br><br>
            <label for="rinfo">More Information</label>
            <input type="text" id="rinfo" name="rinfo"><br><br>
            <button id="register_button" type="submit" value="register_button" name="register_button">Register</button>

        </form>

    </div>

    <script>
        function back() {
            window.location.href = "admin.php";
        }
        function logout() {
            window.location.href = "logout.php";
        }
    </script>



</body>

</html>