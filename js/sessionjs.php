<?php

include("../database.php"); 
ob_start();
$database = new Database();


if(isset($_GET['q'])){
	$_SESSION['lim'] = $_SESSION['lim']+10;
}