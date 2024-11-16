<?php
include ('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp Page</title>
    <style>
        .database_error {
            margin-top: 10px;
            background-color: rgb(180, 116, 116, 0.330);
            color: rgb(88, 36, 36, 0.700);
            text-align: center;
            border-radius: 3px;
            font-size: 19px;
        }

        h2 {
            text-align: center;
            color: #4CAF66;
        }

        a {
            text-decoration: none;
        }

        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            background-color: #f1f1f1;
        }

        form {
            width: 300px;
            max-width: 450px;
            margin: 50px auto;
            border-radius: 5px;

        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 0px 50px 0px 70px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .input-box {
            height: 50px;
            margin-top: 8px;
        }

        .button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .button:hover {
            background-color: #45a049;
        }

        #successfully {
            background-color: #dff0d8;
            color: #3c763d;
            border-radius: 5px;
            margin-top: 5px;
            text-align: center;
        }

        #some_error {
            width: 100%;
            margin-top: 10px;
            background-color: rgb(180, 116, 116, 0.330);
            color: rgb(88, 37, 39, 0.800);
            border-radius: 6px;
            font-size: 15px;
            text-align: center;
        }

        p {
            text-align: center;
        }

        .error {
            color: rgb(88, 36, 36, 0.700);
            border-radius: 3px;
            font-size: 11px;
        }

        span {
            margin-bottom: 10px;
        }

        .switch-page {
            background: none;
            border: none;
            cursor: pointer;
            color: blueviolet;
        }

        .home-btn {
            width: 50px;
            background:none;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <button class="home-btn" onclick="home()">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="" fill="currentColor" class="bi bi-house"
            viewBox="0 0 16 16">
            <path
                d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
        </svg>
    </button>
    <script>function home() { window.history.back(); close(); }</script>
    <div class="container">
        <form method="post" id="signup">
            <div id="successfully"></div>
            <h2>SignUp</h2>
            <div class="input-box">
                <input type="text" id="username" name="Fname" placeholder="Enter First Name">
                <span class="error" id="fname-error"></span><br>
            </div>
            <div class="input-box">
                <input type="text" id="lastName" name="Lname" placeholder="Enter Last Name">
                <span class="error" id="lname-error"></span><br>
            </div>
            <div class="input-box">
                <input type="email" id="email" name="Email" placeholder="Enter Email">
                <span class="error" id="email-error"></span><br>
            </div>
            <div class="input-box">
                <input type="password" id="password" name="Pass" placeholder="Enter Enter Password">
                <span class="error" id="pass-error"></span><br>
            </div>
            <div class="input-box">
                <input type="password" id="confirmPassword" name="Apass" placeholder="Confirm Password">
                <span class="error" id="cpass-error"></span><br>
            </div><br>
            <input class="button" type="submit" name="save" value="Sign Up">
            <div id="some_error"></div>
            <p>Already have an account?
                <button class="switch-page" onclick="login()">Log In
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                        <path fill-rule="evenodd"
                            d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                    </svg>
                </button>
            </p>
        </form>
    </div>
    <?php
    if (isset($_POST['save'])) {
        $FNAME = $_POST['Fname'];
        $LNAME = $_POST['Lname'];
        $Email = $_POST['Email'];
        $password = $_POST['Pass'];
        $cpassword = $_POST['Apass'];
        if ($FNAME == NULL && $LNAME == NULL && $Email == NULL && $password == NULL && $cpassword == NULL) {
            ?>
            <script>document.getElementById("some_error").innerHTML = "Pleace fill all field";</script>
            <?php
        } elseif ($FNAME != NULL && $LNAME == NULL && $Email == NULL && $password == NULL && $cpassword == NULL) {
            ?>
            <script>document.getElementById("lname-error").innerHTML = "Pleace Enter Last Name";</script>
            <script>document.getElementById("email-error").innerHTML = "Pleace Enter Email";</script>
            <script>document.getElementById("pass-error").innerHTML = "Pleace Enter Password";</script>
            <script>document.getElementById("cpass-error").innerHTML = "Pleace Enter Confirm";</script>
            <?php
        } elseif ($FNAME != NULL && $LNAME != NULL && $Email == NULL && $password == NULL && $cpassword == NULL) {
            ?>
            <script>document.getElementById("email-error").innerHTML = "Pleace Enter Email";</script>
            <script>document.getElementById("pass-error").innerHTML = "Pleace Enter Password";</script>
            <script>document.getElementById("cpass-error").innerHTML = "Pleace Enter Confirm";</script>
            <?php
        } elseif ($FNAME != NULL && $LNAME != NULL && $Email != NULL && $password == NULL && $cpassword == NULL) {
            ?>
            <script>document.getElementById("pass-error").innerHTML = "Pleace Enter Password";</script>
            <script>document.getElementById("cpass-error").innerHTML = "Pleace Enter Confirm";</script>
            <?php
        } elseif ($FNAME != NULL && $LNAME != NULL && $Email != NULL && $password != NULL && $cpassword == NULL) {
            ?>
            <script>document.getElementById("cpass-error").innerHTML = "Pleace Enter Confirm Password";</script>
            <?php
        } elseif ($FNAME == NULL && $LNAME == NULL && $Email == NULL && $password == NULL && $cpassword != NULL) {
            ?>
            <script>document.getElementById("fname-error").innerHTML = "Pleace Enter First Name";</script>
            <script>document.getElementById("lname-error").innerHTML = "Pleace Enter Last Name";</script>
            <script>document.getElementById("email-error").innerHTML = "Pleace Enter Email";</script>
            <script>document.getElementById("pass-error").innerHTML = "Pleace Enter Password";</script>
            <?php
        } elseif ($FNAME == NULL && $LNAME == NULL && $Email == NULL && $password != NULL && $cpassword == NULL) {
            ?>
            <script>document.getElementById("fname-error").innerHTML = "Pleace Enter First Name";</script>
            <script>document.getElementById("lname-error").innerHTML = "Pleace Enter Last Name";</script>
            <script>document.getElementById("email-error").innerHTML = "Pleace Enter Email";</script>
            <script>document.getElementById("cpass-error").innerHTML = "Pleace Enter Confirm";</script>
            <?php
        } elseif ($FNAME == NULL && $LNAME == NULL && $Email != NULL && $password == NULL && $cpassword == NULL) {
            ?>
            <script>document.getElementById("fname-error").innerHTML = "Pleace Enter First Name";</script>
            <script>document.getElementById("lname-error").innerHTML = "Pleace Enter Last Name";</script>
            <script>document.getElementById("pass-error").innerHTML = "Pleace Enter Password";</script>
            <script>document.getElementById("cpass-error").innerHTML = "Pleace Enter Confirm";</script>
            <?php
        } elseif ($FNAME == NULL && $LNAME != NULL && $Email == NULL && $password == NULL && $cpassword == NULL) {
            ?>
            <script>document.getElementById("fname-error").innerHTML = "Pleace Enter First Name";</script>
            <script>document.getElementById("email-error").innerHTML = "Pleace Enter Email";</script>
            <script>document.getElementById("pass-error").innerHTML = "Pleace Enter Password";</script>
            <script>document.getElementById("cpass-error").innerHTML = "Pleace Enter Confirm";</script>
            <?php
        }
        if ($password !== $cpassword && $password != NULL && $cpassword != NULL) {
            ?>
            <script>document.getElementById("cpass-error").innerHTML = "Password not match";</script>
            <?php
        }
    }
    ?>
    <?php
    if (isset($_POST['save']) && $password === $cpassword && $password != NULL) {
        $FNAME = $_POST['Fname'];
        $LNAME = $_POST['Lname'];
        $Email = $_POST['Email'];
        $pass1 = $_POST['Pass'];
        $PASS=password_hash($pass1,PASSWORD_BCRYPT);
        // ---------------------this box compaire if NewUser to=== OldUser---------------------------------
        try {
            $userExist = 0;
            $q = "SELECT `first_name` FROM `current_user`";
            $data = mysqli_query($con, $q);
            while ($result = mysqli_fetch_assoc($data)) {
                if ($result['first_name'] === $FNAME) {
                    $userExist = 1;
                }
            }
            if ($userExist == 1) {
                echo '<script>document.getElementById("some_error").innerHTML = "User Already Exists Enter Unick Name ";</script>';
            }
        } catch (Exception) {
            echo "Database Not Found";
        }
        // <!------------------data Insert block ------------------->
        try {
            $q = "INSERT INTO `current_user` (`first_name`, `last_name`,`email`, `pass`) VALUES ('$FNAME','$LNAME','$Email','$PASS')";
            $query = mysqli_query($con, $q);
            if ($query) {
                ?>
                <script>document.getElementById("successfully").innerHTML = "You are SignUp Successfully";</script>
                <?php
            }
        } catch (Exception $E) {
        }
    }
    ?>
    <script>
        function login() {
            window.open("LogIn.php");
            close();
        }
    </script>
</body>

</html>