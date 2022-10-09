<?php
@session_start();

if (isset($_SESSION['userlogin'])){
	require_once "dashboard.php";

}
else{

	require_once "main_index.php";


	
}
?>


