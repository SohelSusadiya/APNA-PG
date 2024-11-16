<!-------------------------------------- databaseconnection with customer -------------------------------------------->
<?php
include ('connection.php');
?>
<?php
try {
    $query = "SELECT * FROM `customer_data`";
    $total = mysqli_query($con, $query);
    $a = 1;
   }
catch (Exception $e) {
   $a = 0;
    echo "recently no data";
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="Style.css"> -->
    <style>
        /* ----------------------product card css------------------------- */
        .database_error {
            margin-top: 10px;
            background-color: rgb(180, 116, 116, 0.330);
            color: rgb(88, 36, 36, 0.700);
            text-align: center;
            border-radius: 3px;
            font-size: 19px;
        }

        .body {
            background: #EEF7FF;
            max-width: 100%;
            overflow: scroll;
            margin: 0%;
            padding: 0%;
            font-family: Arial, sans-serif;
        }

        .main {

            color: #00215E;
            max-width: 1500px;
            width: 100%;
            margin: 40px auto;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: auto;

        }

        .product-card {

            width: 300px;
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            margin: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.9);
        }

        .product-image img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .product-info {
            padding: 20px;
        }

        .product-title {
            font-size: 22px;
            font-weight: 400;
            margin-bottom: 10px;
            text-align: center;
        }

        .product-price {
            font-size: 16px;
            color: green;
        }

        .dinfo {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            padding-top: 5px;
        }

        .main div div label {
            color: black;
            padding-left: 20px
        }

        /* -------------------------all data page css------------- */

        .head {
            display: flex;
            width: 100%;
            /* background: #4e5285; */
            background: #201658;
            height: 70px;
            border-radius: 15px;
            margin-bottom: 10px;
            /* position: fixed; */
            top: 0;
            align-items: center;
            text-align: center;
            justify-content: center;
            z-index: 5;
        }

        .head p {
            font-size: 30px;
            font-weight: bold;
        }

        .head p label {
            padding-right: 15px;
        }

        .org {
            color: rgb(255, 115, 0);
        }

        .wht {
            color: white;
        }

        .grn {
            color: rgb(34, 179, 34);
        }



        .Registation {
            /* margin-top: 20px; */
            background-color: #E1F7F5;
            border: none;
            outline: none;
            color: brown;
            cursor: pointer;
            font-size: 20px;
            text-decoration: none;
            font-family: Arial, sans-serif;

        }

        .reg {
            background-color: #E1F7F5;
            margin-bottom: -20px;
        }

        #preloader {
            background: white url(Walk1.gif)no-repeat center center;
            backdrop-filter: blur(5px);
            height: 100vh;
            width: 100%;
            position: fixed;
            z-index: 100;
            background-size: 5%;
        }

        .view-info {
            /* right: 0px; */
            background: none;
            border: none;
            outline: none;
            cursor: pointer;
            color: #A91D3A;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 17px;
        }

        .outerdiv {
            background-color: #E1F7F5;
            display: flex;
            flex-direction: row;
            height: 100%;
            overflow: hidden;
        }

        .home_div1 {
            padding-bottom: 100px;
            margin-top: 200px;
            display: flex;
            flex-direction: row;
            width: 85%;
            margin-left: 100px;
        }

        .home_div1 p {
            color: black;
            font-weight: bold;
            font-size: 40px;
            text-shadow: black 1px 1px 20px;
        }

        .home_div1 p .rent_color {
            color: #03AED2;
            text-shadow: #03AED2 1px 1px 5px;
        }

        .home_div1 p label {
            padding-right: 10px;
        }

        .home_div2 {
            padding-bottom: 100px;
            margin-top: 200px;
            margin-right: 420px;
            width: 15%;
            filter: drop-shadow(pink 15px -1px 28px);


        }

        .home_div2 img {
            height: 90%;
            width: auto;

        }

        .child {
            background: #9AC8CD;
            align-items: center;
            text-align: center;
        }

        .child h1 label {
            color: #03AED2;
        }

        .child p {
            color: #141E46;
        }

        .home {
            color: white;
            padding-left: 15px;
            padding-right: 25px;
        }

        .footer {
            background: #31363F;
            height: 100%;
            align-items: center;
            text-align: center;
            color: gray;
            font-family: cursive;
        }

        .footer div a {
            color: white;
            margin: 5px;
        }

        .footer div a:hover {
            color: lightslategray;
        }

        #time_outer_div {
            font-size: 2em;
            display: flex;
            flex-direction: row;
            position: absolute;
            right: 10px;
        }

        .clock {
            margin-top: 2px;
        }

        .hours {
            color: #7F27FF;
        }

        .minutes {
            color: #9F70FD;
        }

        .seconds {
            color: #9F70CC;
        }

        /* -----------------------------------------poup page css---------------------------------------- */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
        }

        .popup {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5);
            position: relative;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

    </style>
</head>

<body class="body">

    <!-- preloader reload the page show loader-->
    <div id="preloader"></div>
    <nav class="head">
        <p>
            <label class="org">A</label>
            <label class="org">P</label>
            <label class="wht">N</label>
            <label class="wht">A</label>
            <label class="grn">P</label>
            <label class="grn">G</label>
        </p>
        <div class="home">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="" fill="currentColor" class="bi bi-house"
                viewBox="0 0 16 16">
                <path
                    d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
            </svg>
        </div>

    </nav>

    <!-- home page attrective Ads-->

    <div id="time_outer_div">
        <div class="clock">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-clock"
                viewBox="0 0 16 16">
                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
            </svg>&nbsp;
        </div>
        <div id="time"></div>
    </div>
    <script>
        function updateTime() {
            var currentTime = new Date();
            var hours = currentTime.getHours();
            var minutes = currentTime.getMinutes();
            var seconds = currentTime.getSeconds();

            // Add leading zeros if needed
            hours = (hours < 10 ? "0" : "") + hours;
            minutes = (minutes < 10 ? "0" : "") + minutes;
            seconds = (seconds < 10 ? "0" : "") + seconds;

            var timeString = "<span class='hours'>" + hours + "</span>:" +
                "<span class='minutes'>" + minutes + "</span>:" +
                "<span class='seconds'>" + seconds + "</span>";
            document.getElementById("time").innerHTML = timeString;
        }

        // Update time every second
        setInterval(updateTime, 1000);

        // Initial call to display time immediately
        updateTime();
    </script>
    <div class="outerdiv">
        <div class="home_div1">
            <p>
                <label>Easy</label>
                <label>And</label>
                <label>Fast</label><br>
                <label>Way</label>
                <label>To</label>
                <label class="rent_color">Rent</label>
                <label>Your</label><br>
                <label>Home</label>
            </p>
        </div>
        <div class="home_div2"><img src="image_prev_ui.png" alt="Top_Home_Sell_Ads"></div>
    </div>
    <!-- regestration button -->
    <div class="reg">
        <button class="Registation" onclick="signup()">
            Registation <svg xmlns="http://www.w3.org/2000/svg" width="20" height="" fill="currentColor"
                class="bi bi-clipboard-check" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                <path
                    d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z" />
                <path
                    d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z" />
            </svg>
        </button>
    </div>
    <script>
        function signup() {
            window.open('SignUp.php');
        }
    </script>

    <!-- show product information in the customer -->
    <div class="child">
        <h1>Latest <label>Inventory</label></h1>
        <p>Learn more Propertys And Leasing a commercial Property</p>
    </div>


    <div class="main">
        <?php
        while ($result = mysqli_fetch_assoc($total)) {
            if ($a == 1) {
                ?>
                <div class="product-card">
                    <div class="product-image">
                        <img class="img" src="<?php echo "$result[image]";
                        ?>" alt="Product Image">
                    </div>

                    <div class="product-title"> <label>Rent By:</label>
                        <?php
                        echo "$result[name]";
                        ?>
                    </div>

                    <div style="padding-bottom:8px;" class="dinfo">
                        <label> SQFT:</label>
                        <?php echo "$result[sqft]"; ?>
                    </div>

                    <div class="product-price"> <label>Price:</label>
                        <?php echo "$result[price]", "  rup"; ?>
                    </div>

                    <div style="padding-bottom:10px;" class="dinfo">
                        <label>City:</label>
                        <?php echo "$result[city]"; ?>
                    </div>

                    <!-- To click this button to show more information this product  -->
                    <div>
                        <?php
                        echo " <a href='Prodinfo.php?id=" . $result['ID'] . "'>
                 <input class='view-info' id='openPopupBtn' onclick='togglePopup()' type='submit' value='View All Details'>
                   </a>";
                        ?>
                    </div>

                    <script>
                        function togglePopup() {

                            var popup = document.getElementById('popup');
                            popup.style.display = popup.style.display === 'none' || popup.style.display === '' ? 'flex' : 'none';
                        }

                        window.onclick = function (event) {
                            var popup = document.getElementById('popup');
                            if (event.target == popup) {
                                popup.style.display = 'none';
                            }
                        }
                    </script>
                </div>
                <?php
            }
        }


        // preloader javascript 
        ?>
    </div>
    <script>
        var loader = document.getElementById("preloader");
        window.addEventListener("load", function () {
            loader.style.display = "none";
        })
    </script>
    <!-- website slow loop code and this code show small time preloader   -->
    <footer class="footer">p[;'\/']
        This Website Created by Sohel Susadiya
        <br>
        <br>
        <span>
            <h2 style="color:white">Follow Us</h2>
        </span>
        <div>
            <a href="https://www.facebook.com/profile.php?id=100033927454664">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-facebook" viewBox="0 0 16 16">
                    <path
                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                </svg>
            </a>
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-twitter"
                    viewBox="0 0 16 16">
                    <path
                        d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15" />
                </svg>
            </a>
            <a href="https://www.instagram.com/itz_sohel_susadiya/">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-instagram" viewBox="0 0 16 16">
                    <path
                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                </svg>
            </a>
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-linkedin" viewBox="0 0 16 16">
                    <path
                        d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
                </svg>
            </a>
        </div>
    </footer>
</body>

</html>