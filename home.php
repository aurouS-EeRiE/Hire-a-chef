<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            /* padding-top: 10px; */
            /* margin-bottom: 20px; */
        }

        .logo {
            width: 10%;
            height: 10%;
            margin-top: 10px;
            margin-left: 10px;
            float: left;

        }

        #login,
        #signup {
            padding-top: 30px;
            padding-bottom: 30px;
            text-align: center;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            font-size: 30px;
            border-radius: 25px;
            background: linear-gradient(to left, #99ffcc 0%, #ccccff 100%);

        }

        #login:hover,
        #signup:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.6);
        }

        #login_button,
        #signup_button {
            background-color: #000000;
            color: white;
            padding: 15px 32px;
            text-align: center;
            font-size: 16px;
            border-radius: 15px;
        }

        #login_username,
        #login_password {
            margin: 8px 0;
            border-style: double;
        }

        #dev {
            font-size: 20px;
            color: black;
            text-decoration: underline;
            cursor: pointer;
        }

        #develop {
            display: none;
        }

        * {
            box-sizing: border-box;
        }

        .column {
            width: 33.33%;
            text-align: center;
            margin: auto;
            padding: 10px;
            padding-top: 80px;
        }

        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        #avatar {
            width: 50%;
            display: block;
            border-radius: 50%;
            margin-left: auto;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.6);
            margin-right: auto;
        }

        #name {
            font-size: 30px;
        }

        #email {
            font-size: 20px;
        }

        #social {
            display: flex;
            list-style: none;
            margin-left: 150px;
        }

        #social a {
            font-size: 24px;
            text-decoration: none;
            color: #0B0080;
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
    <div style="padding-bottom:20px">
        <div id="welcome">
            <div>
                <p><img src="Assets/chef.png" alt="Smiley face" width="42" height="42" style="vertical-align:middle">
                    Have chef your way <img src="Assets/chef.png" alt="Smiley face" width="42" height="42" style="vertical-align:middle"></p>
            </div>
        </div>

        <div id="login" style="height : 50%; width:40%; margin:0 auto;">
            <div style="border-style: double; width: 40%; text-align: center; margin:0 auto; ">Login</div><br>
            <form action="php/login.php" method="POST" id="login_form">
                <input type="radio" id="admin" name="admin_chef" value="admin">
                <label for="admin">Admin</label><br>
                <input type="radio" id="chef" name="admin_chef" value="chef">
                <label for="chef">Chef</label><br><br>
                <label for="username">Username</label>
                <input type="text" id="login_username" name="login_username"><br>
                <label for="password">Password</label>
                <input type="password" id="login_password" name="login_password"><br><br>
                <button id="login_button" type="submit" name="login">Login</button>
            </form>
            <div onclick="switchVisible()" style="font-size: 17px;margin-top: 25px; text-decoration:underline; cursor: pointer;">Sign up</div>
        </div>

        <div id="signup" style="height : 50%; width:40%; margin:0 auto; display: none; ">
            <div style="border-style: double; width: 40%; text-align: center; margin:0 auto; ">Sign up</div><br>
            <form action="php/signup.php" method="POST" id="signup_form">
                <input type="radio" id="admin" name="admin_chef" value="admin">
                <label for="admin">Admin</label><br>
                <input type="radio" id="chef" name="admin_chef" value="chef">
                <label for="chef">Chef</label><br><br>
                <label for="fname">Userame</label>
                <input type="text" id="signup_username" name="signup_username"><br>
                <label for="email">Email ID</label>
                <input type="email" id="email" name="signup_email"><br>
                <label for="signup_password1">Password</label>
                <input type="password" id="signup_password1" name="signup_password1"><br>
                <label for="signup_password2">Re-Enter Password</label>
                <input type="password" id="signup_password2" name="signup_password2"><br><br>
                <button id="signup_button" type="submit" value="Submit" name="signup">Sign up</button>
            </form>
            <div onclick="switchVisible()" style="font-size: 17px;margin-top: 25px; text-decoration:underline; cursor: pointer;">Login</div>
        </div>


    </div>
    <div style="text-align:center">
        <a href="#develop" id="dev" onclick="togle()">Developed By</a>
    </div>



    <div class="row" id="develop">
        <div class="column">
            <img src="Assets/srilekha.jpg" id="avatar">
            <p id="name">Addepalli Srilekha</p>
            <p id="email">srilekha_addepalli@srmap.edu.in</p>
            <ul id="social">
                <li><a class="fa fa-globe" href="https://srilekha.me/" target="_blank">&nbsp;&nbsp;</a></li>
                <li><a class="fa fa-github" href="https://github.com/aurouS-EeRiE" target="_blank">&nbsp;&nbsp;</a></li>
                <li><a class="fa fa-linkedin" href="https://www.linkedin.com/in/addepalli-srilekha-a105a71a3/" target="_blank">&nbsp;&nbsp;</a></li>
                <li><a class="fa fa-instagram" href="https://www.instagram.com/srilekha_addepalli/" target="_blank">&nbsp;&nbsp;</a></li>
            </ul>
        </div>
    </div>

    <script>
        function togle() {
            var x = document.getElementById("develop");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function switchVisible() {
            var x = document.getElementById("login");
            var y = document.getElementById("signup");
            if (x) {
                if (x.style.display == 'none') {
                    x.style.display = 'block';
                    y.style.display = 'none';
                } else {
                    x.style.display = 'none';
                    y.style.display = 'block';
                }
            }
        }
    </script>
</body>

</html>