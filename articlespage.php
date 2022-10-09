<?php

@session_start();
require_once "trial-mark.html";

try{
	$dtbase= new PDO("mysql:host=localhost;dbname=islamic_website","root","");
}
catch (PDOException $e){
	$e -> getMessage();

}
	$query = $dtbase-> prepare("SELECT * FROM articles ");
	$query -> execute();
	$query = $query-> fetchAll();
	$ids = array();
	$titles = array();
	$subjects= array();
	$files=array();
	$links=array();
	$images= array();
	$categories= array();
	for ($i=0; ;$i++):
		if (isset($query[$i]['title'])==FALSE)
		{
			break;
		}
		$ids[$i]=$query[$i]['id'];
		$titles[$i]=$query[$i]['title']; 
		$subjects[$i]=$query[$i]['subject'];
		$links[$i]= 'articles/'.$ids[$i].".php";
		$images[$i]= $query[$i]['image'];
		$categories[$i]= $query[$i]['category'];
		$files[$i] = fopen('articles/'. $ids[$i] .'.php', 'w');
		fwrite($files[$i], $titles[$i]."<br> <hr>".$subjects[$i]."<br><hr>". $links[$i]. "<br><hr>" . $categories[$i] . "<br><hr>" . $images[$i] );
		fclose($files[$i]);


		
	endfor;
	$query=null;
	$dtbase=null;

?>
<html dir="rtl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>تذكير  مقالات متنوعة</title>

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
            <li><a href="">تفسير</a></li>
            <li><a href="">حديث</a></li>
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
<div class="mainbodyarticles">
        <?php
		 for ($i=0;$i<count($ids);$i++):
			echo "<div>"; 
			echo "<div><img src='img/".$images[$i] . " '></div>";
		 	echo "<h3><a href=' ".$links[$i] ." '>".$titles[$i] ."</a></h3>"; 
		 	echo "<p>". $subjects[$i] . "</p>"; 
		 	echo "</div>"; 
		 endfor;
		?>
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