<?php
include ('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    *{
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
    .database_error {
        margin-top: 10px;
        background-color: rgb(180, 116, 116, 0.330);
        color: rgb(88, 36, 36, 0.700);
        text-align: center;
        border-radius: 3px;
        font-size: 19px;
    }

    #preloader {
        text-align: center;
        align-items: center;
        background: white url(Walk.gif)no-repeat center center;
        backdrop-filter: blur(5px);
        height: 100vh;
        width: 100%;
        position: fixed;
        z-index: 100;
        background-size: 3%;
    }

    .close-btn {
        position: absolute;
        color: red;
        border: none;
        cursor: pointer;
        right: 10px;
    }

    .slider {
        width: 600px;
        height: auto;
        margin: 20px auto 0;
        overflow: hidden;
        position: relative;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.9);
        border-radius: 5px;
    }

    .slides {
        align-items: center;
        text-align: center;
        display: flex;
        transition: transform 0.5s ease;
    }

    .slide {
        min-width: 100%;
        overflow: hidden;
    }

    img {
        width: 100%;
        height: 350px;
    }

    .product-owner {
        font-size: 22px;
        font-weight: 400;
        margin: 20px;
        align-items: center;
        text-align: center;
    }

    .product-price {
        font-size: 22px;
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

    .main div {
        padding-left: 45px;
    }
    .more_details-head{
        margin-left: 210px;

    }
    .no_more_details {
        font-size:18px;
        color:gray;
        background-color:lightyellow;
    }

    .perent-div-left-right {
        display: flex;
        margin-left: 50px;
    }

    .left-div .right-div .center-div {

        display: flex;
        flex-direction: column;
        /* width: 5%; */
    }
</style>

<body class="prodinfo_body">
    <div id="preloader"></div>
    <script>
        var loader = document.getElementById("preloader");
        window.addEventListener("load", function () {
            loader.style.display = "none";
        })
    </script>
    <div class="outer_body_div">
        <svg onclick="clos()" class="close-btn" xmlns="http://www.w3.org/2000/svg" width="36" height="36"
            fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
            <path
                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
        </svg>
        <div class="slider">
            <div class="slides">
                <?php
                try {
                    $pnum = $_GET['id'];
                    $second = "SELECT * FROM `customer_data` WHERE `ID`='$pnum'";
                    $sec = mysqli_query($con, $second);
                    ?>
                    <?php
                    while ($demo = mysqli_fetch_assoc($sec)) {
                        ?>
                        <div class="slide">
                            <img class="img" src="<?php echo "$demo[img1]"; ?>" alt="Product Image">
                        </div>
                        <div class="slide">
                            <img class="img" src="<?php echo "$demo[img2]"; ?>" alt="Product Image">
                        </div>
                        <div class="slide">
                            <img class="img" src="<?php echo "$demo[img3]"; ?>" alt="Product Image">
                        </div>
                        <?php
                    }
                    ?>
                    <?php

                } catch (Exception $e) {

                }
                ?>

            </div>
        </div>
        <?php
        try {
            $pnum = $_GET['id'];
            $second = "SELECT * FROM `customer_data` WHERE `ID`='$pnum'";
            $sec = mysqli_query($con, $second);
            ?>
            <div class="main">
                <?php
                while ($third = mysqli_fetch_assoc($sec)) {
                    ?>
                    <div class="product-owner"><label>Rent By:</label>
                        <?php
                        echo "$third[name]";
                        ?>
                    </div>


                    <div class="perent-div-left-right">
                        <div class="left-div">
                            <div class="dinfo"><label>SQFT:</label>&nbsp;&nbsp;
                                <?php echo "$third[sqft]"; ?>
                            </div>
                            <br>
                            <div class="product-price"> <label>Price:</label>&nbsp;&nbsp;
                                <?php echo "$third[price]", "  rup"; ?>
                            </div>
                            <br>
                            <div class="dinfo"><label>Contect:</label>/<svg xmlns="http://www.w3.org/2000/svg" width="15"
                                    height="15" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                    <path
                                        d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                </svg>/
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                                    class="bi bi-whatsapp" viewBox="0 0 16 16">
                                    <path
                                        d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                                </svg>/
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                                    class="bi bi-envelope-at" viewBox="0 0 16 16">
                                    <path
                                        d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2zm3.708 6.208L1 11.105V5.383zM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2z" />
                                    <path
                                        d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648m-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                                </svg>:&nbsp;&nbsp;
                                <?php echo "$third[contect]"; ?>
                            </div>

                        </div>
                        <div class="center-div">
                            
                            <div class="dinfo">
                                <label>Num of floors:</label>&nbsp;&nbsp;
                                <?php echo "$third[num_of_floors]"; ?>
                            </div>
                            <br>
                            <div class="dinfo">
                                <label>Num of Rooms:</label>&nbsp;&nbsp;
                                <?php echo "$third[num_of_rooms]"; ?>
                            </div>
                            <br>
                            <div class="dinfo"><label>City:</label>&nbsp;&nbsp;
                                <?php echo "$third[city]"; ?>
                            </div>

                        </div>
                        <div class="right-div">

                            <div class="dinfo"><label>Nearest School:</label>&nbsp;&nbsp;
                                <?php  
                                if($third['nearest_school']==NULL){
                                    echo "<label style='font-size:18px;color:gray;background-color:lightyellow;'>There is no school available nearby</label>";}else{
                                        echo "$third[nearest_school]";
                                    }?>
                            </div><br>
                            <div class="dinfo"><label>Nearest college:</label>&nbsp;&nbsp;
                                <?php 
                                 if($third['nearest_college']==NULL){
                                    echo "<label style='font-size:18px;color:gray;background-color:lightyellow;'>There is no college available nearby</label>";}else{
                                        echo "$third[nearest_college]";
                                    } ?>
                            </div><br>
                            <div class="dinfo"><label>Nearest mall:</label>&nbsp;&nbsp;
                                <?php 
                                if($third['nearest_Dmart']==NULL){
                                    echo "<label style='font-size:18px;color:gray;background-color:lightyellow;'>There is no Mall available nearby</label>";}else{
                                        echo "$third[nearest_Dmart]";
                                    }?>
                            </div>

                        </div>

                    </div> <br><br>

                   
                    <div class="more_details-head">
                        <label>more Details :</label>&nbsp;&nbsp;
                        <?php if ($third['more_details'] == Null) {
                            echo "<label style='font-size:18px;color:gray;background-color:lightyellow;'>No other details</label>";
                        } else {
                            echo "<label class='more_details'>", "$third[more_details]", "</label>";
                        } ?>
                    </div>


                    <?php
                }
                ?>
            </div>
            <?php

        } catch (Exception $e) {

        }
        ?>

    </div>
    <script>
        // image slider javaScript code dont any change this code
        let slideIndex = 0;
        const slides = document.querySelectorAll('.slide');
        function showSlide(n) {
            slides.forEach(slide => {
                slide.style.display = 'none';
            });
            if (n >= slides.length) {
                slideIndex = 0;
            }
            slides[slideIndex].style.display = 'block';
            slideIndex++;
            setTimeout(() => showSlide(slideIndex), 3000); // Change slide every 3 seconds
        }
        showSlide(slideIndex);
    </script>
    <script>
        // This javaScript code to return previuse page
        function clos() {
            $pnum = 0;
            window.history.back();
            window.close();
        }
    </script>

</body>

</html>