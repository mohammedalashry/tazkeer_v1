<?php
if ($_SERVER['REQUEST_METHOD']=="POST"){
//* --------------------------------------------------Begin  Page---------------------------------------------- *//

session_start();
setcookie('registerDataFname',$_POST['firstName'],time()+600);
setcookie('registerDataLname',$_POST['lastName'],time()+600);
setcookie('registerDataEmail',$_POST['emailAddress'],time()+600);


class User {
 public function add_user ($fn , $ln, $em, $pa){
try {
 	$db = new PDO("mysql:host=n4m3x5ti89xl6czh.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=tt1bqatv5vie1w94","ip2wg0u4ijy736k4","j8uaormv2lstoxjl");
 	$db->exec("INSERT INTO users (firstname,lastname,email,password,type_of_access) VALUES ( '$fn' , '$ln', '$em' , '$pa','user' )");
}
catch(PDOException $e){
	echo "failed due to" . $e->getMessage();


}

 } // end function add_user

}// end class User


class Register {

public $error=array(
'firstnameerror'=>0,
'lastnameerror'=>0,
'emailerror'=>0,
'passerror'=> 0

); // end array of errors

	public function check_firstName ($fn){
		if (preg_match("/[^qwertyuiopasdfghjklzxcvbnmضصذثقفغعهخحجدطكألإإآلآمنتالبيسشئءؤرلاىةوزظ]/i", $fn)==1): $this -> error["firstnameerror"]="not a valid name";endif;
	}// end first name check
	public function check_lastName ($ln){
		if (preg_match("/[^qwertyuiopasdfghjklzxcvbnmضصذثقفغعهخحجدطكألإإآلآمنتالبيسشئءؤرلاىةوزظ]/i", $ln)==1): $this -> error["lastnameerror"]="not a valid name";endif;
		
	}// end last name check
	public function check_email ($em){

		if (filter_var($em,FILTER_VALIDATE_EMAIL)== false ): $this-> error['emailerror'] = "not a valid email"; endif;
		if (preg_match("/[^qwertyuiopasdfghjklzxcvbnm@._1234567890]/", $em)==1): $this -> error['emailerror']="not a valid email" ;endif;
		if  ((preg_match("/gmail.com$/i", $em) ==0) && (preg_match("/hotmail.com$/i", $em) ==0) && (preg_match("/outlock.com$/i", $em) ==0) && (preg_match("/yahoo.com$/i", $em) ==0)): $this-> error['emailerror'] = "not a valid email"; endif;
		try {

 			$db = new PDO("mysql:host=n4m3x5ti89xl6czh.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=tt1bqatv5vie1w94","ip2wg0u4ijy736k4","j8uaormv2lstoxjl");
		}
		catch(PDOException $e){

			echo "failed due to" . $e->getMessage();
		}
			$findEmail = $db ->prepare("SELECT email FROM users WHERE email='$em'");
			$findEmail ->execute();
			$resEmail= count($findEmail->fetchAll());	
			$findEmail=null;
			$dbase=null;
			if ($resEmail>=1): $this -> error['emailerror'] = "found"; endif;
			

	}// end email check
	public function check_pass  ($pa){

		if (strlen($pa)<8): $this-> error["passerror"]= "password is less than 8 charachters"; endif;
		if (preg_match("/[qwertyuiopasdfghjklzxcvbnm]/u", $pa)==0): $this -> error['passerror']="not a valid password" ;endif;
		if (preg_match("/[QWERTYUIOPASDFGHJKLZXCVBNM]/u", $pa)==0): $this -> error['passerror']="not a valid password" ;endif;
		if (preg_match("/[1-9]/i", $pa)==0): $this -> error['passerror']="not a valid password" ;endif;


	
	}// end password check

}// end class Register 

		$_SESSION['emailFoundDiv']='none';
		$_SESSION['emailErrorDiv']="none";
		$_SESSION['passErrorDiv']="none";
		$_SESSION['fnErrorDiv']="none";
		$_SESSION['lnErrorDiv']="none";

if ($_SERVER['REQUEST_METHOD']=='POST'):

	$moda  = filter_var($_POST['firstName'],FILTER_SANITIZE_STRING) ;
	$moda1 = filter_var($_POST['lastName'],FILTER_SANITIZE_STRING) ;
	$moda2 = filter_var($_POST['emailAddress'],FILTER_SANITIZE_STRING) ;
	$moda3 = filter_var($_POST['password'],FILTER_SANITIZE_STRING) ;

	$reg = new Register;
	$reg -> check_firstName($moda);
	$reg -> check_lastName($moda1);
	$reg -> check_email($moda2);
	$reg -> check_pass($moda3);

  if (($reg-> error['firstnameerror']!=0)||($reg-> error['lastnameerror']!=0)||($reg-> error['emailerror']!=0) || ($reg-> error["passerror"]!=0) ) :
	if ($reg-> error['emailerror']!=0){
		if ($reg -> error['emailerror']=='found'):
			$_SESSION['emailFoundDiv']="block";

		else:
			$_SESSION['emailErrorDiv']="block";
		endif;
	};
	if ($reg-> error['passerror']!=0){
		$_SESSION['passErrorDiv']="block";

	};

	if ($reg-> error['firstnameerror']!=0){
		$_SESSION['fnErrorDiv']="block";

	};
	if ($reg-> error['lastnameerror']!=0){
		$_SESSION['lnErrorDiv']="block";

	};

	header("location:register.php");
  else :
	$user = new User();
	$user->add_user($moda,$moda1,$moda2,$moda3 );
	header("location:doneregisteration.php");
  endif;

endif;

//* -------------------------------------------------Finish Page-------------------------------------------- *//
}else{echo "you don`t have access to this page";}
?>
