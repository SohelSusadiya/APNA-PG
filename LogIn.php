<?php
include ('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn page</title>
</head>
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
        color: #007bff;
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

    .login-form {
        width: 300px;
        max-width: 450px;
        margin: 50px auto;
        padding-bottom: 60px;
        border-radius: 5px;
    }

    .container {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 50px 0px 70px 0px;
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
        margin-top: 10px;
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
    }

    .button:hover {
        background-color: #0f69c9;
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

    .database_error {
        margin-top: 10px;
        background-color: rgb(180, 116, 116, 0.330);
        color: rgb(88, 36, 36, 0.700);
        text-align: center;
        border-radius: 3px;
        font-size: 19px;
    }

    .all-error {
        text-align: center;
        margin-top: 10px;
    }

    .switch-page {
        background: none;
        border: none;
        cursor: pointer;
        color: blueviolet;
    }

    .home-btn {
        width: 50px;
        background: none;
        border: none;
        cursor: pointer;
    }
</style>

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
        <form class="login-form" action="#" method="post">
            <h2>Login</h2>
            <div class="input-box">
                <input type="text" name="lname" placeholder="Enter Username">
                <span class="error" id="name-error"></span>
            </div>
            <div class="input-box">
                <input type="password" name="lpass" placeholder="Enter your Password">
                <span class="error" id="pass-error"></span>
            </div>
            <input class="button login" type="submit" name="logsubmit" value="Login">
            <div class="all-error">
                <span id="some_error"></span>
            </div>
            <br>
            <p>Already have an account?
                <button class="switch-page" onclick="signup()">Sign Up
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person-plus" viewBox="0 0 16 16">
                        <path
                            d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                        <path fill-rule="evenodd"
                            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
                    </svg>
                </button>
            </p>
        </form>
    </div>
    <script>
        function signup() {
            window.open('SignUp.php');
            close();
        }
    </script>
    <?php
    if (isset($_POST['logsubmit'])) {
        $name = $_POST['lname'];
        $pass = $_POST['lpass'];
        if ($name == NULL && $pass == NULL) {
            ?>
            <script>document.getElementById("name-error").innerHTML = "Pleace Enter Username";
                document.getElementById("pass-error").innerHTML = "Pleace Enter Password";</script>
            <?php
        } elseif ($name != NULL && $pass == NULL) {
            ?>
            <script>document.getElementById("pass-error").innerHTML = "Pleace Enter Password";</script>
            <?php
        } elseif ($name == NULL && $pass != NULL) {
            ?>
            <script>document.getElementById("name-error").innerHTML = "Pleace Enter Username";</script>
            <?php
        }
    }
    if (isset($_POST['logsubmit']) && $name != NULL && $pass != NULL) {
        // ---------------------this box compaire if NewUser to=== OldUser---------------------------------
        try {
            $Exist = 0;
            $q = "SELECT `first_name` FROM `current_user`";
            $data = mysqli_query($con, $q);
            while ($result = mysqli_fetch_assoc($data)) {
                if ($result['first_name'] === $name) {
                    $Exist = 1;
                }
            }
            if ($Exist == 1) {
                $q = "SELECT `first_name`,`pass` FROM `current_user`";
                $data = mysqli_query($con, $q);
                while ($result = mysqli_fetch_assoc($data)) {
                    $password = $result['pass'];
                    if (password_verify($pass, $password)) {
                            $_SESSION['user'] = $name;
                            echo"<script>window.open('Uprofile.php');</script>";
    
                    } elseif ($result['first_name'] === $name && !password_verify($pass, $password)) {
                        echo '<script>document.getElementById("pass-error").innerHTML = "Password incorrect";</script>';
                    }
                }
            }
            if ($Exist == 0) {
                echo '<script>document.getElementById("some_error").innerHTML = "Username or Password incorrect";</script>';
            }
        } catch (Exception $e) {
            echo "Database Not Found";
        }
        // <!------------------data Insert block ------------------->
    }
    ?>
</body>

</html>