<?php
@session_start();
if (isset($_SESSION['userlogin']) && $_SESSION['userlogin']== 'admin' ):
	require_once "adminpage.php";
elseif(isset($_SESSION['userlogin']) && $_SESSION['userlogin']== 'user' ):
	require_once "userpage.php";
else:
	echo "you don`t have access to this page";
endif;

?>
