<?php
session_start();
if (isset($_SESSION['userlogin']) ){
	session_unset();
	session_destroy();
	header("location:/islamic_website");
}
else{
	header("location:error");
}
?>