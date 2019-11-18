<?php

session_start();
session_destroy();

echo ("Session Destroyed");
header("Refresh:1; url=home.php");

?>