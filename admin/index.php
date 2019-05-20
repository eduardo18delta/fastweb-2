<?php

session_start();

if(isset($_SESSION['user'])) 
{ 
header("Location: ../view/menu.php");
} 
else 
{ 
header("Location: ../view/login.php"); 
} ;