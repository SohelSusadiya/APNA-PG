
<?php
// <!------------------------ database connection with customer ------------------------------->
try {
    $servername="localhost";
    $username="root";
    $password="";
    $DB='customer';
    $CU_T='current_user';
    $CD_T='customer_data';
    $con = mysqli_connect($servername,$username,$password);
    try{
        //check if database is created before creating database
        $sql="CREATE DATABASE `$DB`";
        $result=mysqli_query($con,$sql);
        // mysqli_select_db($con, $DB);
    }
    catch(exception $d){
        // datadate has already been created then execute this code
    }
    mysqli_select_db($con, $DB);
    

    try{
        //check if table is created before creating table
        $crt_T="CREATE TABLE `$DB`.`$CU_T` (`first_name` VARCHAR(255) NOT NULL , `last_name` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , `pass` VARCHAR(255) NOT NULL , `D/T` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`first_name`)) ENGINE = InnoDB;";
        $result=mysqli_query($con,$crt_T);
    }
    catch(exception $UT){
    }



    try{
        //check if table is created before creating table
        $crt_T2="CREATE TABLE `$DB`.`$CD_T` (`name` VARCHAR(255) NOT NULL , `ID` INT(255) NOT NULL AUTO_INCREMENT , `image` VARCHAR(255) NOT NULL , `price` INT(255) NOT NULL , `sqft` INT(255) NOT NULL , `city` VARCHAR(255) NOT NULL , `contect` VARCHAR(255) NOT NULL ,`img1` VARCHAR(255) NOT NULL ,`img2` VARCHAR(255) NOT NULL ,`img3` VARCHAR(255) NOT NULL ,`num_of_rooms` INT(5) NOT NULL ,`num_of_floors` INT(5) NOT NULL ,`nearest_school` VARCHAR(100) NOT NULL,`nearest_college` VARCHAR(100) NOT NULL ,`nearest_Dmart` VARCHAR(100) NOT NULL,`more_details` VARCHAR(255) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;";
        $result=mysqli_query($con,$crt_T2);

    }
    catch(Exception $d){
    }
   
} catch (Exception $e) {
    echo '<p class="database_error">Server Error Database Not Found . Please check your internet and auther connection</p>';
}
finally{
    // echo"session close";
    session_unset();
    // session_destroy();
}
?>