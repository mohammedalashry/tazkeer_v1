<?php
session_start();
require_once "trial-mark.html";

if ((@$_SERVER['HTTP_REFERER']!='http://localhost/islamic_website/personaldata.php') && (@$_SERVER['HTTP_REFERER']!='http://localhost/islamic_website/changepassword.php')){
	exit('you can`t access this page');

}
$error=0;
$_SESSION['passwordChangedSucsses']=0;

if ($_SERVER['REQUEST_METHOD']=='POST' ){
			try{

				$dbase = new PDO("mysql:host=n4m3x5ti89xl6czh.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=tt1bqatv5vie1w94","ip2wg0u4ijy736k4","j8uaormv2lstoxjl");
				
				}
			catch(PDOException $e){
				echo "failed"; echo $e -> getMessage();
				}
				$email=$_SESSION['Email'];
				$oldpassword=$_POST['oldpassword'];
				$newpassword=$_POST['newpassword'];
				$checkOldPass= $dbase -> prepare("SELECT password FROM users WHERE email='$email' AND password= '$oldpassword' ");
				$checkOldPass -> execute();
				$checkResult= count ($checkOldPass -> fetchAll());
				if ($checkResult==1):
					if (strlen($newpassword)<8){$error='كلمة المرور الجديدة لابد ان تكون اكثر  من  7 حروف  ';}
					if (preg_match("/[qwertyuiopasdfghjklzxcvbnm]/u", $newpassword)==0){$error='كلمة المرور لابد ان  تحتوي علي  حرف صغير ';}
					if (preg_match("/[QWERTYUIOPASDFGHJKLZXCVBNM]/u", $newpassword)==0){$error= 'كلمة المرور لابد أن تحتوي علي حرف كبير ';}
					if (preg_match("/[1-9]/i", $newpassword)==0){'كلمة المرور لابد أن تحتوي علي رقم ';}
					if ($error==0){
						$changepassword= $dbase->prepare("UPDATE users SET password = '$newpassword' WHERE email='$email' AND password= '$oldpassword' ");
						$changepassword -> execute();
						$changepassword=null;
						$_SESSION['passwordChangedSucsses']=1;
						header("location:personaldata.php");

					};


				
				else:
					$error= 'كلمة المرور القديمة خاطئة  ';
				endif;
				$checkOldPass=null;
				$dbase=null;





}


?>
<!DOCTYPE html>
<html dir="rtl">
<head>
	<title>personal data</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/mainstyle.css">
	<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Gulzar&display=swap" rel="stylesheet">
<style type="text/css">
	.personal-data{
		display: grid;
		grid-template-columns: repeat(4,20vw);
		grid-template-areas: "personaldatalabelpass1 . personaldatapass1 ." "personaldatalabelpass2 . personaldatapass2 ." ". change-pass change-pass .";
		margin: 20px 0;
		grid-row-gap: 20px;
		justify-content: center;

	} 
</style>
</head>

<body>
<div class="heart">	

<div class="header">
    <div class="menu">
        <h1><a href="index.php" style="color:#f5d32d;">تذكير</a> </h1>
        <ul class="desktopmenu">
                <li><a href="quraanmainpage.php">قرأن كريم</a></li>
                <li><a href="#">تفسير</a></li>
                <li><a href="#">حديث</a></li>
                <li class="sub-menunav"> قائمة العضو <i class="fa fa-caret-down"></i></li>
                <ul class="sub-menu">
                    <li><a href="#"> المفضلات</a></li>
                    <li><a href="#"> المساهمات </a></li>
                    <li><a href="#">السجل </a></li>
                    <li><a href="personaldata.php"> البيانات الشخصية</a></li>
                </ul>
                <li><a href="logout.php"> تسجيل الخروج</a></li>
        </ul>
        <div class="mobilemenu">
            <i class="menu-icon fa fa-bars" onclick="modaelgen()"></i>
            <ul>
                <li menuelement><a href="quraanmainpage.php">قرأن كريم</a></li>
                <li menuelement><a href="#">تفسير</a></li>
                <li menuelement><a href="#">حديث</a></li>
                <li menuelement class="sub-menunavmobile"> قائمة العضو <i menuelement class="fa fa-caret-down"></i></li>
                <ul menuelement class="sub-menumobile">
                    <li menuelement><a href="#"> المفضلات</a></li>
                    <li menuelement><a href="#"> المساهمات </a></li>
                    <li menuelement><a href="#">السجل </a></li>
                    <li style="display: <?php if ($_SESSION['userlogin']=='admin'){echo 'block';}else{echo 'none';}?> ;" ><a href="newarticle.php"> نشر مقالة  جديدة  </a></li>
                    <li menuelement><a href="personaldata.php"> البيانات الشخصية</a></li>
                </ul>
                <li menuelement><a href="logout.php"> تسجيل الخروج</a></li>
            </ul>
        </div>
    </div>

    <img src="img/mainimg.jpg">
    <div></div>
    <p>بِسْمِ اللَّـهِ الرَّحْمَـٰنِ الرَّحِيمِ</p>
    <h2>إِنَّا عَرَضْنَا الأَمَانَةَ عَلَى السَّمَوَاتِ وَالأَرْضِ وَالْجِبَالِ</h2>

</div>
	<form class="personal-data" method="POST">
		<label required style="grid-area: personaldatalabelpass1"> كلمة المرور الحالية  </label>
		<input required style="grid-area: personaldatapass1" name="oldpassword" type="password">
		<label required style="grid-area: personaldatalabelpass2"> كلمة المرور الجديدة  </label>
		<input required style="grid-area: personaldatapass2" name="newpassword" type="password">
		<button style="grid-area: change-pass;cursor: pointer;height: 30px;width:30vw;max-width: 300px;margin: 0 auto;">تغيير</button>

	</form>
	<label style="color:red;"><?php if($error!=0){echo $error;} ?></label>

<div class="footer">
    <ul>
    <li><a href="contactus.html">اتصل بنا</a></li>
    <li><a href="contributewithus.html">ساهم معنا</a></li>
    <li><a href="privacypolicy.html">سياسة الخصوصية</a></li>    
    </ul>
    <p>تمت البرمجة بواسطة <a href="https://www.facebook.com/Mohammed.Alashry99">محمد العشري</a></p>
</div>
</div>
<script src="JS/main.js">
</script>
</body>
</html>