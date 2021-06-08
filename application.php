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

        .logo {
            width: 10%;
            height: 10%;
            margin-top: 10px;
            margin-left: 10px;
            float: left;

        }

        #apply_button {
            background-color: #000000;
            color: white;
            padding: 15px 32px;
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
            border-radius: 15px;
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
        <p style = "float:left; padding-left: 20px;font-size: 20px;cursor: pointer;" id = "back" onclick="back()"><u>back</u></p>
        <p id = "logout" name = "logout" onclick="logout()"><u>Logout</u></p>
        <div id="welcome">
            <div>
                <p><img src="Assets/chef.png" alt="Smiley face" width="42" height="42" style="vertical-align:middle">
                    Have chef your way <img src="Assets/chef.png" alt="Smiley face" width="42" height="42"
                        style="vertical-align:middle"></p>
            </div>
        </div>
    </div>

    <div style="text-align: center; font-size: 25px; padding: 30px;">
        <form id="postform" action="php/apply.php" method="POST" style=" border-style: double; padding: 20px;">
            <label for="cname">Name</label>
            <input type="text" id="cname" name="cname"><br><br>

            <label for="cage">Age</label>
            <input type="number" id="cage" name="cage"><br><br>

            <label for="cgender">Gender</label>
            <input type="radio" id="female" name="male_female" value="female">
            <label for="female">Female</label>
            <input type="radio" id="male" name="male_female" value="male">
            <label for="male">Male</label><br><br>

            <label for="cphone">Phone Number</label>
            <input type="tel" id="cphone" name="cphone"><br><br>

            <label for="cemail">Email ID</label>
            <input type="email" id="cemail" name="cemail"><br><br>

            <label for="cexp">Describe your past experience</label>
            <input type="text" id="cexp" name="cexp"><br><br>

            <label for="cdish">What is your remarkable dish/cusine</label>
            <input type="text" id="cdish" name="cdish"><br><br>

            <label for="ctime">Available for </label>
            <select name="ctime" id="ctime">
                <option value="fulltime">Full time</option>
                <option value="parttime">Part time</option>
                <option value="Both">I am comfortable with any</option>
            </select><br><br>

            <label for="copt">Why do you want to begin/continue food as a career option?</label>
            <input type="text" id="copt" name="copt"><br><br>

            <label for="cfood">What is cooking to you?</label>
            <input type="text" id="cfood" name="cfood"><br><br>

            <script>
                var url_string = window.location.href;
                var url = new URL(url_string);
                var name = url.searchParams.get('name');
                document.getElementById("postform").innerHTML += "<input hidden name='name' value=" + name + ">";
            </script>

            <button id="apply_button" type="submit" name="apply_button">Apply</button>
        </form>

    </div>

    <script>
        function back() {
            window.location.href = "chef.php";
        }
        function logout() {
            window.location.href = "logout.php";
        }
    </script>


</body>

</html>