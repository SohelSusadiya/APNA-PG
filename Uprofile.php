<?php
include ('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="refresh" content="20">
  <title>Document</title>
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

  body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
  }

  .head {
    text-align: center;
    color: #2b3336;
  }

  .head h2 label {
    color: purple;
  }

  .logout {
    background: none;
    border: none;
    outline: none;
    cursor: pointer;
    color: #754565;
    font-size: 20px;
  }

  .profile-bg {
    background: #9AC8CD;
    height: 200px;
  }

  /* ----------------------product card css------------------------- */
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

  .remove {
    background-color: #009688;
    /* width: 60px; */
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-top: 10px;
    margin-bottom: 10px;
  }

  .remove:hover {
    background-color: #00796b;
  }

  .rmv {
    text-align: center;
    align-items: center;
    justify-content: center;
    margin-left: 25%;
  }

  .dinfo {
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    color: rgb(97, 97, 97);
    margin: 5px;
  }

  .sellbtn {
    border: none;
    color: darkgreen;
    background: none;
    border-radius: 5px;
    cursor: pointer;
  }

  .sellbtn:hover {
    border: none;
    color: brown;
    background: none;
    border-radius: 5px;
    font-size: 14.3px;
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

  .view-info {
    right: 0;
    background: none;
    border: none;
    outline: none;
    cursor: pointer;
    color: #A91D3A;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-size: 17px;
  }
</style>

<body>
  <div id="preloader"></div>
  <?php
  // ---------------------------login user session start----------------------------
  
  session_start();
  error_reporting(0);
  $user = $_SESSION['user'];
  $last_name = $_SESSION['lname'];
  $_SESSION['u'] = $user;
  ?>
  <?php
  // -----------user authorized identification and user session Ending block--------------
  if ($user == true) {
  } else {
    header('location:LogIn.php');
  }
  ?>
  <?php
  // <!---------------------------------- data fatch in customer data --------------------------------->
  try {
    $query = "SELECT * FROM `customer_data` WHERE `name`='$user'";
    $total = mysqli_query($con, $query);
    // $result = mysqli_fetch_assoc($total);
  } catch (Exception $e) {
  }
  ?>
  <?php
  // <!---------------------------------- data fatch in customer data --------------------------------->
  try {
    $query = "SELECT * FROM `current_user` WHERE `first_name`='$user'";
    $data = mysqli_query($con, $query);
    $duser = mysqli_fetch_assoc($data);
  } catch (Exception $e) {
  }
  ?>



  <!------------------------------------- user profile info --------------------------------------------->
  <div class="profile-bg">
    <a href="Logout.php">
      <input onclick="logout()" class="logout" type="submit" value="Logout"><svg xmlns="http://www.w3.org/2000/svg"
        width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
        <path fill-rule="evenodd"
          d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
        <path fill-rule="evenodd"
          d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
      </svg>
    </a>
    <div class="head">
      <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="currentColor" class="bi bi-person-circle"
        viewBox="0 0 16 16">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
        <path fill-rule="evenodd"
          d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
      </svg>
      <h2>
        welcome
        <label>
          <?php echo " $duser[first_name]", " ", "$duser[last_name]"; ?>
        </label>
      </h2>
      <h4>
        <?php echo " $duser[email]"; ?>
      </h4>
    </div>
  </div>
  <script>function logout() { close(); }</script>



  <!------------------------------------- user submited all data print ------------------------------->
  <button class="sellbtn" type="submit" name="nextpage" onclick="nxtpag()">Add Home Rent&nbsp;
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="" fill="currentColor" class="bi bi-house"
      viewBox="0 0 16 16">
      <path
        d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
    </svg>
  </button>
  <div class="main">
    <?php
    while ($result = mysqli_fetch_assoc($total)) {
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

        <div class="product-price"> <label>Price:</label>
          <?php echo "$result[price]", " rup"; ?>
        </div>

        <div class="dinfo">
          <label> SQFT:</label>
          <?php echo "$result[sqft]"; ?>
        </div>

        <div class="dinfo">
          <label>City:</label>
          <?php echo "$result[city]"; ?>
        </div>

        <div class="dinfo">
          <label>Contect:</label>
          <?php echo "$result[contect]"; ?>
        </div>

        <div class="dinfo">
          <label>Num of Rooms:</label>&nbsp;&nbsp;
          <?php echo "$result[num_of_rooms]"; ?>
        </div>

        <div class="dinfo">
          <label>Num of floors:</label>&nbsp;&nbsp;
          <?php echo "$result[num_of_floors]"; ?>
        </div>

        <div class="dinfo"><label>Nearest School:</label>&nbsp;&nbsp;
          <?php
          if ($result['nearest_school'] == NULL) {
            echo "<label style='font-size:18px;color:gray;background-color:lightyellow;'>no available</label>";
          } else {
            echo "$result[nearest_school]";
          } ?>
        </div>
        <div class="dinfo"><label>Nearest college:</label>&nbsp;&nbsp;
          <?php
          if ($result['nearest_college'] == NULL) {
            echo "<label style='font-size:18px;color:gray;background-color:lightyellow;'>no available</label>";
          } else {
            echo "$result[nearest_college]";
          } ?>
        </div>
        <div class="dinfo"><label>Nearest mall:</label>&nbsp;&nbsp;
          <?php
          if ($result['nearest_Dmart'] == NULL) {
            echo "<label style='font-size:18px;color:gray;background-color:lightyellow;'>no available</label>";
          } else {
            echo "$result[nearest_Dmart]";
          } ?>
        </div>

        <div class="dinfo">
          <label>more Details :</label>&nbsp;&nbsp;
          <?php if ($result['more_details'] == Null) {
            echo "<label style='font-size:18px;color:gray;background-color:lightyellow;'>No details</label>";
          } else {
            echo "<label class='more_details'>", "$result[more_details]", "</label>";
          } ?>
        </div>


        <div>
          <div>
            <label class="rmv">
              <?php
              echo " <a href='Uprofile.php?id=" . $result['ID'] . "'>
              <input class='remove' type='submit' onclick='d()' value='Hand Up'>
              </a>";
              ?>
            </label>
          </div>
          
        </div>
      </div>
      <?php
    }
    ?>
  </div>
  <?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $q = "DELETE FROM `customer_data` WHERE `ID`='$id'";
    $d = mysqli_query($con, $q);
  }
  ?>
</body>
<script>
  function nxtpag() {
    window.open('dataIn.php');
  }

</script>
<script>
  var loader = document.getElementById("preloader");
  window.addEventListener("load", function () {
    loader.style.display = "none";
  })
</script>
<script>
  function d() {
    setTimeout(function () {
      window.location.reload();
    }, 10)
  }
</script>

</html>

<?php
$_SESSION['u'] = $user;
?>