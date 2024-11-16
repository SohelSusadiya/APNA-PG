<?php
// <!------------------------------------------ database connection with customer --------------------------------------------->
include ('connection.php');
?>
<?php
session_start();
$user = $_SESSION['u'];
if (isset($_POST['submit'])) {
    // main image insert code
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "images/" . $filename;
    move_uploaded_file($tempname, $folder);
    // img1 insert code
    $filename1 = $_FILES["image1"]["name"];
    $tempname1 = $_FILES["image1"]["tmp_name"];
    $image1 = "images_one/" . $filename1;
    move_uploaded_file($tempname1, $image1);
    // img2 insert code
    $filename2 = $_FILES["image2"]["name"];
    $tempname2 = $_FILES["image2"]["tmp_name"];
    $image2 = "images_two/" . $filename2;
    move_uploaded_file($tempname2, $image2);
    // img3 insert code
    $filename3 = $_FILES["image3"]["name"];
    $tempname3 = $_FILES["image3"]["tmp_name"];
    $image3 = "images_three/" . $filename3;
    move_uploaded_file($tempname3, $image3);

    $p = $_POST['price'];
    $s = $_POST['sqft'];
    $c = $_POST['city'];
    $contect = $_POST['contect'];
    $badroom = $_POST['rooms'];
    $floor=$_POST['floor'];
    $school=$_POST['school'];
    $college=$_POST['college'];
    $DMart=$_POST['Dmart'];
    $more_details = $_POST['datails'];
}
?>
<?php
// -----------user authorized identification--------------
if ($user == true) {

} else {
    header('location:LogIn.php');
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        display: flex;
        font-family: Arial, sans-serif;
        background-color: #faf6f0;
        justify-content: center;
        align-items: center;
        /* margin: 10% auto; */
        /* overflow: hidden; */
    }

    .database_error {
        margin-top: 10px;
        background-color: rgb(180, 116, 116, 0.330);
        color: rgb(88, 36, 36, 0.700);
        text-align: center;
        border-radius: 3px;
        font-size: 19px;
    }


    #successfully {
        background-color: #dff0d8;
        color: #3c763d;
        border-radius: 5px;
        margin-top: 5px;
        text-align: center;
    }

    #error {
        background-color: rgb(180, 116, 116, 0.330);
        color: rgb(88, 37, 39, 0.800);
        border-radius: 5px;
        margin-top: 5px;
        text-align: center;
    }

    #data-submit-error {
        background-color: rgb(180, 116, 116, 0.330);
        color: rgb(88, 36, 36, 0.700);
        border-radius: 5px;
        margin-top: 5px;
        text-align: center;
    }


    .main1 {
        padding: 50px;
        margin-top: 1%;
        padding-bottom: 1%;
        width: 500px;
        height: 100%;
        background-color: white;
        box-shadow: 0px 5px 15px rgb(0, 0, 0, 0.35);
        border-radius: 20px;
    }

    .form .input_fild {
        margin: 4px;
        padding: 10px;
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 15px;
        outline: none;

    }

    .submit {
        background-color: #009688;
        width: 100%;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 20px;
        cursor: pointer;
        margin-top: 10px;
        margin-bottom: 10px
    }

    .submit:hover {
        background-color: #00796b;
    }

    .input-container {
        display: flex;
        flex-direction: column;
        margin-bottom: 30px;
    }

    .img {
        position: relative;
        margin-right: 30%;
    }

    .img .img_input_fild {
        display: inline;
        margin: 6px;
        padding: 13px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 15px;
        outline: none;

    }

    .close {
        position: absolute;
        left: 0;
        top: 0;
        margin: 20px;
        color: red;
        border: none;
        cursor: pointer;
    }

    .moreD_box {
        height: 70px;
    }

    .redio-btn {
        cursor: pointer;
    }

    .roomcld {
        margin: 1.30%;
    }
    .roomcld input{
        cursor: pointer;
        margin: 5px;
    }
</style>

<body>
    <svg class="close" onclick="close1()" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
        class="bi bi-arrow-left" viewBox="0 0 16 16">
        <path fill-rule="evenodd"
            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
    </svg>
    <script>function close1() { close(); }</script>
    <div class="main1">
        <form class=" form" action="" method="POST" enctype="multipart/form-data">
            <div id="successfully"></div>
            <div id="error"></div>
            <div id="data-submit-error"></div>
            <div class="input-container">
                <div class="img">
                    <label>Home Main image:</label>
                    <input class="img_input_fild " name="image" type="file" required>
                </div>

                <div class="img">
                    <label>Hall image :</label>
                    <input class="img_input_fild " name="image1" type="file" required>
                </div>

                <div class="img">
                    <label>Kitchen image :</label>
                    <input class="img_input_fild " name="image2" type="file" required>
                </div>

                <div class="img">
                    <label>Bedroom image :</label>
                    <input class="img_input_fild " name="image3" type="file" required>
                </div>

                <label>Price:</label>
                <input class="input_fild " name="price" type="number" placeholder="Enter valid Price" required
                    style="color:green;">
                <label>SQFT:</label>
                <input class="input_fild " name="sqft" type="number" placeholder="Enter house SQFT" required>

                <label>Location:</label>
                <input class="input_fild " name="city" type="text" placeholder="Enter city location" required>

                <label>Contect:</label>
                <input class="input_fild " name="contect" type="text" placeholder="Enter your contect information"
                    required>
                    <span>
                        <br>
                        <label>number of Floors:</label>
                        <br><br>
                        <label class="roomcld">1<input type="radio" name="floor" value="1"></label>
                        <label class="roomcld">2<input type="radio" name="floor" value="2"></label>
                        <label class="roomcld">3<input type="radio" name="floor" value="3"></label>
                        <label class="roomcld">4<input type="radio" name="floor" value="4"></label>
                        <label class="roomcld">5<input type="radio" name="floor" value="5"></label>
                        <label class="roomcld">6<input type="radio" name="floor" value="6"></label>
                        <label class="roomcld">7<input type="radio" name="floor" value="7"></label>
                        <label class="roomcld">8<input type="radio" name="floor" value="8"></label>
                        <label class="roomcld">9<input type="radio" name="floor" value="9"></label>
                        <label class="roomcld">10<input type="radio" name="floor" value="10"></label>
                    </span>
                    <br><br>
                <span>
                    <br>
                    <label>number of Badrooms:</label>
                    <br><br>
                    <label class="roomcld">1<input type="radio" name="rooms" value="1"></label>
                    <label class="roomcld">2<input type="radio" name="rooms" value="2"></label>
                    <label class="roomcld">3<input type="radio" name="rooms" value="3"></label>
                    <label class="roomcld">4<input type="radio" name="rooms" value="4"></label>
                    <label class="roomcld">5<input type="radio" name="rooms" value="5"></label>
                    <label class="roomcld">6<input type="radio" name="rooms" value="6"></label>
                    <label class="roomcld">7<input type="radio" name="rooms" value="7"></label>
                    <label class="roomcld">8<input type="radio" name="rooms" value="8"></label>
                    <label class="roomcld">9<input type="radio" name="rooms" value="9"></label>
                    <label class="roomcld">10<input type="radio" name="rooms" value="10"></label>
                </span>
                <br><br>
                <h1>Optional Details</h1>
                <br>
                <label>Nearest School:</label>
                <input class="input_fild " name="school" type="text" placeholder="Enter Nearest School Name" >
                <br>
                <label>Nearest College:</label>
                <input class="input_fild " name="college" type="text" placeholder="Enter Nearest college Name" >
                <br>
                <label>Nearest D-Mart:</label>
                <input class="input_fild " name="Dmart" type="text" placeholder="Enter Nearest D-Mart Name" >
                <br>
                <label>more Home Details</label><input class="input_fild moreD_box" name="datails" type="text"
                    placeholder="Enter more home Details">
                <button class="submit" type="submit" name="submit">submit</button>
            </div>
        </form>
    </div>
</body>

</html>
<?php
// <!--------------------------------------- costomer data insert in customer_data table ----------------------------------------->
if (isset($_POST['submit'])) {
    if ($folder == NULL || $p == NULL || $s == NULL || $c == NULL || $contect == NULL || $p == 0 || $s == 0) {
        ?>
        <script>
            document.getElementById("data-submit-error").innerHTML = "Data Not Submited ,Please Form fill Error";
        </script>
        <?php
    }
    if ($folder != NULL && $p != NULL && $s != NULL && $c != NULL && $contect != NULL && $p != 0 && $s != 0) {
        try {
            $q = "INSERT INTO `$CD_T` (`name`,`image`, `price`, `sqft`, `city`,`contect`,`img1`,`img2`,`img3`,`num_of_rooms`,`num_of_floors`,`nearest_school`,`nearest_college`,`nearest_Dmart`,`more_details`) VALUES ('$user','$folder','$p','$s','$c','$contect','$image1','$image2','$image3','$badroom','$floor','$school','$college','$DMart','$more_details');";
            $query = mysqli_query($con, $q);
            if ($query) {
                ?>
                <script>
                    document.getElementById("successfully").innerHTML = "Data Submited Successfully";
                    setTimeout(function () {
                        close();
                    }, 1000);
                </script>
                <?php
                die();
            }
        } catch (Exception $E) {
            echo $E;
            ?>
            <script>
                document.getElementById("error").innerHTML = "input fill Error pleace Try Again";
            </script>
            <?php
        }
    }
}
?>