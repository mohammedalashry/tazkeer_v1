<?php
session_start();
require_once "trial-mark.html";


if (!isset($_SESSION['emailDivError']) && !isset($_SESSION['passDivError'])){
	$_SESSION['emailDivError']="none";
	$_SESSION['passDivError']="none";
}

?>

<html dir="rtl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title> تذكير تسجيل الدحول</title>

	<link rel="stylesheet" href="css/mainstyle.css">
	<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Gulzar&display=swap" rel="stylesheet">
    <style type="text/css">

        .login-form{
            display:grid;
            grid-template-columns: repeat(2,40vw);
            grid-template-areas: "label1 label2"  "label3 label4" "label5 label5";
            column-gap: 2vw;
            grid-row-gap: 2vw;
            }	
        input[value="دخول"]:hover{
            background-color: #fcf9c6;
            cursor: pointer;
            }
        .login-form input{
            max-width: 30vw;
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
	  <form method="post" action="loginformaction.php" class="form login-form" >
		
		<label style="grid-area:label1 ;" required for="email"> البريد الالكتروني  </label>
		<input style="grid-area:label2 ;" required type="text" name="emailAddress" id="email-" placeholder=" البريد الالكتروني  " value="<?php if (isset($_COOKIE['loginDataEmail'])){ echo $_COOKIE['loginDataEmail'];}?>" ><br>
		<label style="grid-area:label3 ;" required for="passwordlabel"> كلمة السر  </label>
		<input style="grid-area:label4 ;" required type="password" name="password" id="password" ><br>
		<input style="grid-area:label5 ; margin-left: auto;margin-right: auto;width:20vw;" type="submit" value = "دخول">
	  </form>
	  <p style="display: <?php echo $_SESSION['emailDivError']; ?> ;">البريد الالكتروني غير صحيح </p>
	  <p style="display: <?php echo $_SESSION['passDivError']; session_unset(); session_destroy(); ?> ;"> كلمة المرور غير صحيحة </p>
</div>
<div class="footer">
    <ul>
    <li><a href="#">اتصل بنا</a></li>
    <li><a href="#">ساهم معنا</a></li>
    <li><a href="#">سياسة الخصوصية</a></li>    
    </ul>
    <p>تمت البرمجة بواسطة <a href="https://www.facebook.com/Mohammed.Alashry99">محمد العشري</a></p>
</div>
</div>
<script src="JS/main.js">
</script>
</body>
</html>