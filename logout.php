<?php
session_start();
session_destroy();
header('location:http://localhost/tafinder/front-page.php');
?>
