<?php

@session_start();
if ($_SERVER['REQUEST_METHOD']=='POST'){
	$formtitle= $_POST['title'];
	$formsubject= $_POST['subject'];
	$formcategory= $_POST['category'];
	$formimage = $_POST['image'];
	try{
	$dtbase= new PDO("mysql:host=n4m3x5ti89xl6czh.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=tt1bqatv5vie1w94","ip2wg0u4ijy736k4","j8uaormv2lstoxjl");
	}
	catch(PDOException $e){
	echo "failed";echo $e -> getMessage();
	}
	$query = $dtbase -> prepare("INSERT INTO articles (title,subject,category, image) VALUES ('$formtitle','$formsubject','$formcategory','$formimage')");
	$query -> execute();
	$query = null;
	$dtbase= null;
	header("location:articlespage.php");

}

?>

<html dir="rtl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title> تذكير الصفحة الرئيسية</title>

	<link rel="stylesheet" href="css/mainstyle.css">
	<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Gulzar&display=swap" rel="stylesheet">
    <style type="text/css">
 form {
	display: grid;
	grid-template-columns: repeat(4,25%);
	grid-template-areas: "titlelabel titleinput titleinput ." "subjectlabel subjectinput subjectinput ." "categorylabel categoryinput . ." "imagelabel imageinput fileslabel filesinput" ". publish publish ." ;
	grid-row-gap:10px;
	margin: 20px;
	grid-column-gap: 1vw;

}	
.inputfile{
	cursor: pointer; 
	width: 20vw;
	max-width: 200px; 
	max-height: 30px;
	border-radius: 50px;
}
.inputfileclick{
	background-color: #fcf9c6;
	height: 20vw;
	max-height: 30px;
	box-sizing: border-box;
    border: solid #9eb23b 3px;
    border-radius: 20px;
    text-align: center;
    font-weight: bold;
    cursor: pointer;
}
@media only screen and (max-width:300px){
	form {
	grid-template-areas: "titlelabel titleinput . ." "subjectlabel subjectinput . ." "categorylabel categoryinput . ." 
	"imagelabel imageinput . ." "fileslabel filesinput . ." ". publish publish ." ;

	}
}

	</style>



</head>

<body>
<div class="heart">	

<div class="header">
    <div class="menu">
        <h1><a href="../islamic_website/" style="color:#f5d32d;">تذكير</a> </h1>
        <ul class="desktopmenu">
                <li><a href="quraanmainpage.html">قرأن كريم</a></li>
                <li><a href="">تفسير</a></li>
                <li><a href="">حديث</a></li>
                <li class="sub-menunav"> قائمة العضو <i class="fa fa-caret-down"></i></li>
                <ul class="sub-menu">
                    <li><a href=""> المفضلات</a></li>
                    <li><a href=""> المساهمات </a></li>
                    <li><a href="">السجل </a></li>
                    <li><a href=""> البيانات الشخصية</a></li>
                </ul>
                <li><a href=""> تسجيل الخروج</a></li>
        </ul>
        <div class="mobilemenu">
            <i class="menu-icon fa fa-bars" onclick="modaelgen()"></i>
            <ul>
                <li menuelement><a href="quraanmainpage.html">قرأن كريم</a></li>
                <li menuelement><a href="">تفسير</a></li>
                <li menuelement><a href="">حديث</a></li>
                <li menuelement class="sub-menunavmobile"> قائمة العضو <i menuelement class="fa fa-caret-down"></i></li>
                <ul menuelement class="sub-menumobile">
                    <li menuelement><a href=""> المفضلات</a></li>
                    <li menuelement><a href=""> المساهمات </a></li>
                    <li menuelement><a href="">السجل </a></li>
                    <li menuelement><a href=""> البيانات الشخصية</a></li>
                </ul>
                <li menuelement><a href=""> تسجيل الخروج</a></li>
            </ul>
        </div>
    </div>

    <img src="img/mainimg.jpg">
    <div></div>
    <p>بِسْمِ اللَّـهِ الرَّحْمَـٰنِ الرَّحِيمِ</p>
    <h2>إِنَّا عَرَضْنَا الأَمَانَةَ عَلَى السَّمَوَاتِ وَالأَرْضِ وَالْجِبَالِ</h2>

</div>
    <form method="POST">
			<label style="grid-area: titlelabel;">العنوان  </label>
			<input style="grid-area: titleinput;height: 30px;" type="text" name="title">
			<label style="grid-area: subjectlabel;"> الموضوع    </label>
			<textarea name='subject' style="grid-area: subjectinput; height: 300px;overflow: auto;" contenteditable='true' ></textarea>
			<label style="grid-area: categorylabel;" >القسم    </label>
			<select style="grid-area: categoryinput;" name="category" >
				<option value="quraan">قرءان</option>
				<option value="hadeeth"> حديث   </option>
				<option value="serah">  سيرة  </option>
				<option value="fekh">  فقه  </option>
			</select>
			<label style="grid-area: imagelabel;"> صورة للموضوع  (اذا يوجد) </label>
			<input type="file" name="image" id="picture" hidden>
			<label for="picture" style="grid-area: imageinput;" class="inputfileclick"> أضف</label>
			<label style="text-align:center;grid-area: fileslabel;">الملفات</label>
			<input type="file" name="uploadedfiles" id="files" multiple hidden>
			<label for="files" style="grid-area: filesinput;" class="inputfileclick"> أضف</label>
			<input style="grid-area: publish; height: 30px;width: 20vw; margin: 5vw auto;" type="submit" value="نشر " >


	</form>
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