<?php
@session_start();
if (isset($_SESSION['userlogin']) && $_SESSION['userlogin']== 'admin' ):
	require_once "newarticlemain.php";
else:
	require_once "error.php";
endif;
?>
