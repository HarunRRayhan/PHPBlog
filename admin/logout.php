<?php
session_start();
/* 
 * This is testing Project for PHP Blog
 * So please push your improvisation  * 
 */

session_destroy();
header("Location: login.php");
exit();