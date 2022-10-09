<?php
@session_start();

?>

<html dir="rtl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title> تذكير الصفحة الرئيسية</title>

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
<div class="mainbody">
    <div class="divinsidebody">
        <div><img src="img/quraan.jpg"></div>
        <h3><a href="quraanmainpage.php">قرأن كريم</a></h3>
    </div>
    <div class="divinsidebody">
        <div><img src="img/hadeeth.jpeg"></div>
        <h3><a href=""> حديث </a></h3>
    </div>
    <div class="divinsidebody">
        <div><img src="img/tafseer.jpg"></div>
        <h3><a href="">تفسير </a></h3>
    </div>
    <div class="divinsidebody">
        <div style=""><img src="img/articles.jpg"></div>
        <h3 style="font-size:1.5vw;"><a href="articlespage.php"> مقالات اسلامية <br> متنوعة</a></h3>
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
<script src="JS/main.js">
</script>
</body>
</html>