<?php
session_start();
if(isset( $_SESSION["userlogin"])){
	if ($_SESSION['userlogin']=='user' || $_SESSION['userlogin']=='admin'){
		require_once "personaldatapage.php";

	}
}else{
	echo "put error page";
}
?>