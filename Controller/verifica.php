<?php
session_start();
if(!isset($_SESSION['Usuario'])||!isset($_SESSION['Name'])){
	header("Location:HomePage.html");
	exit;
}
?>