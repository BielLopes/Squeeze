<?php
session_start();
if(!isset($_SESSION['Usuario'])||!isset($_SESSION['Login'])){
	header("Location:../../HomePage.html");
	exit;
}
?>