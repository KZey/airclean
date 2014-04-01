<?php
include_once("../codelibrary/connection.php");
session_unset();
session_destroy();
header("location:login.php");
exit();
?>