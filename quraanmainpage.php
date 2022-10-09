<?php
require_once "trial-mark.html";

?>
<html dir="rtl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>تذكير | قرأن كريم</title>

	<link rel="stylesheet" href="css/mainstyle.css">
	<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Gulzar&display=swap" rel="stylesheet">
   


</head>
<body>
<div class="heart">	

<div class="header">
    <div class="menu">
        <h1><a href="index.php" style="color:#f5d32d;">تذكير</a> </h1>
        <ul class="desktopmenu">
            <li><a href="">قرأن كريم</a></li>
            <li><a href="#">تفسير</a></li>
            <li><a href="#">حديث</a></li>
            <li><a href="login.php">تسجيل دخول</a></li>
            <li><a href="register.php">عضو جديد</a></li>
        </ul>
        <div class="mobilemenu">
            <i class="menu-icon fa fa-bars" onclick="modaelgen()"></i>
            <ul>
                <li menuelement><a href="">قرأن كريم</a></li>
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
<div class="searchdiv">
<input class="searchbox" type="text" placeholder="ابحث..." contenteditable="true">
<button class="searchboxbutton"><i class="fa fa-search"></i></button>
</div>
<div class="fullbody">
    <div class="full-quraan">
    </div>
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
<script src="JS/quraanpage.js">

</script>
<script src="JS/main.js">
</script>
</body>
</html>