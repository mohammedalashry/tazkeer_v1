<?php

session_start();
require_once "trial-mark.html";

if (isset($_SESSION['emailErrorDiv']) == FALSE && isset($_SESSION['passErrorDiv'])==FALSE && isset($_SESSION['fnErrorDiv'])==FALSE && isset($_SESSION['lnErrorDiv'])==FALSE )
{
$_SESSION['emailFoundDiv']='none';
$_SESSION['emailErrorDiv']='none';
$_SESSION['passErrorDiv']='none';
$_SESSION['fnErrorDiv']="none";
$_SESSION['lnErrorDiv']="none";
};

?>
<html dir="rtl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title> تذكير تسجيل عضو جديد</title>

	<link rel="stylesheet" href="css/mainstyle.css">
	<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Gulzar&display=swap" rel="stylesheet">
    <style type="text/css">

.form {
	display:grid;
	grid-template-columns: repeat(4,20vw);
	grid-template-areas: "label1 label2 label5 label6"  "label3 label4 label7 label8" ". label9 label9 .";
	column-gap: 2vw;
	grid-row-gap: 2vw;
}
.registersubmitbutton {
	justify-content: center;
	grid-area: label9;
	margin-right: auto;
	margin-left: auto;
    width: 20vw;
}

.registersubmitbutton:hover {
	background-color: #fcf9c6;
    cursor: pointer;

}

    </style>



</head>

<body>
<div class="heart">	

<div class="header">
    <div class="menu">
		<h1><a href="index.php" style="color:#f5d32d;">تذكير</a> </h1>
        <ul>
            <li><a href="quraanmainpage.php">قرأن كريم</a></li>
            <li><a href="#">تفسير</a></li>
            <li><a href="#">حديث</a></li>
            <li><a href="login.php">تسجيل دخول</a></li>
            <li><a href="register.php">عضو جديد</a></li>
        </ul>
		<div class="mobilemenu">
            <i class="menu-icon fa fa-bars" onclick="modaelgen()"></i>
            <ul>
                <li menuelement><a href="quraanmainpage.php">قرأن كريم</a></li>
                <li menuelement><a href="#">تفسير</a></li>
                <li menuelement><a href="#">حديث</a></li>
                <li menuelement><a href="login.php">تسجيل دخول</a></li>
                <li menuelement><a href="register.php">عضو جديد</a></li>
            </ul>
        </div>
    </div>
    <img src="img/mainimg.jpg">
    <div></div>
    <p>بِسْمِ اللَّـهِ الرَّحْمَـٰنِ الرَّحِيمِ</p>
    <h2>إِنَّا عَرَضْنَا الأَمَانَةَ عَلَى السَّمَوَاتِ وَالأَرْضِ وَالْجِبَالِ</h2>

</div>
<div class="mainbodyother">
<form method="post" action="registerformaction.php" class="form">
		<label required for="f-name" style="grid-area: label1;"> الاسم  الأول  </label>
		<input required type="text" name="firstName" class ="fname" placeholder="الاسم الاول"  style="grid-area: label2;" value="<?php if (isset($_COOKIE['registerDataFname'])) { echo $_COOKIE['registerDataFname'];} ?>"><br>
		<label required for="l-name" style="grid-area: label3;"> اسم العائلة  </label>
		<input required type="text" name="lastName" id="lname" placeholder=" اسم العائلة " style="grid-area: label4;" value="<?php  if (isset($_COOKIE['registerDataLname'])) { echo $_COOKIE['registerDataLname']; } ?>"><br>
		<label required for="email" style="grid-area: label5;" > البريد الالكتروني  </label>
		<input required type="text" name="emailAddress" id="email-" placeholder=" البريد الالكتروني  " style="grid-area: label6;" value="<?php if (isset($_COOKIE['registerDataEmail'])) { echo $_COOKIE['registerDataEmail'];} ?>"><br>
		<label required for="password" style="grid-area: label7;"> كلمة السر  </label>
		<input required type="password" name="password" id="password" style="grid-area: label8;"><br>
		<input class="registersubmitbutton" type="submit" value=" تسجيل  ">
	  </form>

	  <a href="login.php" style='margin-right: auto;margin-left: auto;margin-top: -50px;margin-bottom:20px;'>تسجيل الدخول  </a>
	  <p style="display: <?php echo $_SESSION['fnErrorDiv'] ?>;">الاسم  الاول  به حروف غير صحيحة </p>
	  <p style="display: <?php echo $_SESSION['lnErrorDiv'] ?>;">الاسم الثاني  به حروف غير صحيحة </p>
	  <p style="display: <?php echo $_SESSION['emailErrorDiv'] ?>;">الابريد الاكلتروني غير صحيح</p>
	  <p style="display: <?php echo $_SESSION['emailFoundDiv'] ?> ;"> البريد الالكتروني موجود بالفعل قم  بالدخول   </p>
	  <p style="display: <?php echo $_SESSION['passErrorDiv'];  session_unset();session_destroy();?>;">كلمة المرور غير مناسبى </p>
</div>
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