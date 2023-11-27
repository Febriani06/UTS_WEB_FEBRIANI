<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register Page</title>
    <link rel="icon" href="asset/img/aa.jpg" type="image/x-icon">
    <!-- Include MDL CSS -->
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">

    <!-- Include MDL JavaScript -->
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    <!-- Include Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Include Roboto Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,500,700">

    <style>
        body {
            padding: 50px;
            font-family: 'Roboto', sans-serif;
            background-color: #F5F5F5;
        }

        /*Sign In Form*/
        .signin {
            position: relative;
            height: 700px;
            width: 500px;
            margin: auto;
            box-shadow: 0px 30px 125px -5px #000;
        }

        /*Background Img*/
        .back-img {
            position: relative;
            width: 100%;
            height: 250px;
            background: url('asset/img/photo-4.jpg')no-repeat center center;
            background-size: cover;
        }

        .layer {
            background-color: rgba(33, 150, 243, 0.5);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .active {
            padding-left: 25px;
            color: #fff;
        }

        .nonactive {
            color: rgba(255, 255, 255, 0.6);
        }

        .sign-in-text {
            left: -24px;
            top: 175px;
            position: absolute;
            z-index: 1;
        }

        h2 {
            padding-left: 15px;
            font-size: 25px;
            text-transform: uppercase;
            display: inline-block;
            font-weight: 300;
        }

        .point {
            position: absolute;
            z-index: 1;
            color: #fff;
            top: 235px;
            padding-left: 156px;
            font-size: 20px;
        }

        /*form-section*/
        .form-section {
            padding: 70px 90px 70px 90px;
        }

        .keep-text {
            font-size: 15px;
            color: #BDBDBD;
        }

        .forgot-text {
            font-size: 12px;
            color: #BDBDBD;
            text-align: right;
        }

        /*sign-in-btn*/
        .sign-in-btn {
            width: 100%;
            height: 75px;
            position: absolute;
            bottom: 0;
            border-radius: 0px;
            background-color: rgba(63, 78, 191, 1);
        }

        /* Custom Style for Floating Label */
        .mdl-textfield__input:focus+.mdl-textfield__label,
        .mdl-textfield--floating-label.is-focused .mdl-textfield__label {
            color: #3f4ebe;
        }

        .mdl-textfield__input:valid+.mdl-textfield__label,
        .mdl-textfield--floating-label.is-dirty .mdl-textfield__label {
            color: #3f4ebe;
        }
    </style>
</head>

<body>
    <div class="signin">
        <div class="back-img">
            <div class="sign-in-text">
                <h2><a class="active" href=" login.php" style="text-decoration:none;  color:wheat;">Sign in</a></h2>
                <h2><a style="color:white;">Sign up</a></h2>
            </div><!--/.sign-in-text-->
            <div class=" layer">
            </div><!--/.layer-->
            <p class="point">&#9650;</p>
        </div><!--/.back-img-->
        <div class="form-section">
            <form action="config/register_proses.php" method="post" id="registerForm">
                <?php
                // Start the session
                session_start();

                // Check if there is a message
                if(isset($_SESSION['message'])) {
                    echo '<div class="notification" id="notification" style="color: blue;">'.$_SESSION['message'].'</div>';

                    // Remove the message after displaying
                    unset($_SESSION['message']);
                }
                ?>

                <!-- Email -->
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="email" id="email" name="email"
                        oninput="validateInput(this)" required>
                    <label class="mdl-textfield__label" for="email">Email</label>
                    <span class="mdl-textfield__error">Enter a correct Email</span>
                </div>
                <br />
                <!-- Password -->
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input pattern=".{8,}" class="mdl-textfield__input" type="password" id="password" name="password"
                        oninput="validateInput(this)" required>
                    <label class="mdl-textfield__label" for="password">Password</label>
                    <span class="mdl-textfield__error">Minimum 8 characters</span>
                </div>
                <br />
                <!-- Confirm Password -->
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input pattern=".{8,}" class="mdl-textfield__input" type="password" id="confirmPassword"
                        name="confirmPassword" oninput="validateInput(this)" required>
                    <label class="mdl-textfield__label" for="confirmPassword">Confirm Password</label>
                    <span class="mdl-textfield__error">Minimum 8 characters</span>
                </div>

                <br />

            </form>

        </div><!--/.form-section-->

        <button type="submit"
            class="sign-in-btn mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--raised mdl-button--colored"
            onclick="submitForm()">
            Sign up
        </button><!--/button-->
    </div><!--/.signin-->



    <script>
        function submitForm() {
            document.getElementById("registerForm").submit();
        }
    </script>
    <script>
        function validateInput(input) {
            if (input.value.length > 0) {
                input.classList.add('is-dirty');
            } else {
                input.classList.remove('is-dirty');
            }
        }
    </script>
    <script>
        // Add a script to hide the notification after 3 seconds
        setTimeout(function () {
            var notification = document.getElementById('notification');
            if (notification) {
                notification.style.display = 'none';
            }
        }, 3000); // 3000 milliseconds = 3 seconds
    </script>

</body>

</html>