<?php
session_start();
session_unset();
header('location:Login.php');
session_destroy();
?>