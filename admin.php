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

        .button {
            background-color: #000000;
            border: none;
            color: white;
            padding: 20px;
            vertical-align: middle;
            text-align: center;
            font-size: 15px;
            font-family: cursive;
            text-decoration: none;
            cursor: pointer;
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
    <p id = "logout" name = "logout" onclick="logout()"><u>Logout</u></p>
        <div id="welcome">
            <div>
                <p><img src="Assets/chef.png" alt="Smiley face" width="42" height="42"
                        style="vertical-align:middle">Have chef your way <img src="Assets/chef.png" alt="Smiley face"
                        width="42" height="42" style="vertical-align:middle"></p>
            </div>
            <div style="margin-top: 100px;">
                <a class="button" href="register.php">Register your restaurant</a>
                <a class="button" href="verify.php">Verify applications</a>
            </div>
        </div>
    </div>

    <script>
        function logout() {
            window.location.href = "logout.php";
        }
    </script>




</body>

</html>