<?php
 	
if ($_SERVER['REQUEST_METHOD']=='POST'){// The whole page process
//* --------------------------------------------------Begin  Page---------------------------------------------- *//
	session_start();
	setcookie("loginDataEmail",$_POST['emailAddress'],time()+600);


	class Check_access{


		public function check_emailAddress($user){
		// 1-start check email function 

			try{

				$dbase = new PDO("mysql:host=n4m3x5ti89xl6czh.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=tt1bqatv5vie1w94","ip2wg0u4ijy736k4","j8uaormv2lstoxjl");
				
				}
			catch(PDOException $e){
				echo "failed"; echo $e -> getMessage();
				}
			$actionEmail = $dbase ->prepare("SELECT email FROM users WHERE email='$user'");
			$actionEmail ->execute();
			$resultEmail= count($actionEmail->fetchAll());
			$_SESSION['Email']=$user;
			$actionEmail=null;
			$dbase=null;
			return $resultEmail;
			
		
		}// 1-finish function check email 
		public function check_password($user,$pass){
		 // 2-start  check password function

			try{

				$dbase = new PDO("mysql:host=n4m3x5ti89xl6czh.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=tt1bqatv5vie1w94","ip2wg0u4ijy736k4","j8uaormv2lstoxjl");
				
				}
			catch(PDOException $e){
				echo "failed"; echo $e -> getMessage();
				}
			$actionPassword = $dbase ->prepare("SELECT password FROM users WHERE email ='$user'");
			$actionPassword ->execute();
			$actionPassword = $actionPassword->fetchAll();
			$actionPassword= $actionPassword[0]['password'];
			if ($actionPassword==$pass):
				$resultPassword=1;
			else:
				$resultPassword=0;

			endif;

			$actionPassword=null;
			$dbase=null;
			return $resultPassword;

			 
		}// 2-finish check password function
		public function check_type($user,$pass){
		 // 3-start  check type function
			try{

				$dbase = new PDO("mysql:host=n4m3x5ti89xl6czh.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=tt1bqatv5vie1w94","ip2wg0u4ijy736k4","j8uaormv2lstoxjl");
				
				}
			catch(PDOException $e){
				echo "failed"; echo $e -> getMessage();
				}
			$queryType=$dbase-> prepare("SELECT type_of_access FROM users WHERE email='$user' AND password='$pass'; ");
			$queryType->execute();
			$queryType= $queryType->fetchAll();
			$queryType= $queryType[0]['type_of_access'];
			if ($queryType=="user"):
				$resultType=0;
			else:
				$resultType=1;
			endif;
			$queryType=null;
			$dbase=null;
			return $resultType;



		}// 3-finish  check type function

	}// 0-MAIN Close CLASS Check_access //

	$check_access= new Check_access();
	$emailCorrect= $check_access -> check_emailAddress(filter_var($_POST['emailAddress'],FILTER_SANITIZE_STRING)); 
	if ($emailCorrect==1 ):
		
		$passCorrect= $check_access -> check_password(filter_var($_POST['emailAddress'],FILTER_SANITIZE_STRING),filter_var($_POST['password'],FILTER_SANITIZE_STRING));


		if($passCorrect==1){

			$accessType= $check_access -> check_type(filter_var($_POST['emailAddress'],FILTER_SANITIZE_STRING),filter_var($_POST['password'],FILTER_SANITIZE_STRING));
			if($accessType==0)
			{
				$_SESSION['userlogin']='user';
				header("location:dashboard.php");
			}else{
				$_SESSION['userlogin']='admin';
				header("location:dashboard.php");
			}

		}else{
			header("location:login.php");
			$_SESSION['emailDivError']="none";
			$_SESSION['passDivError']="block";

		}

	else:
		header("location:login.php");
		$_SESSION['emailDivError']="block";
		$_SESSION['passDivError']="none";


	endif;
//* -------------------------------------------------Finish Page-------------------------------------------- *//
}else {echo "You don`t have access to this page";}

?>
