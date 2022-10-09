<?php
@session_start();
$user= $_SESSION['Email'];
try{

			$dbase = new PDO("mysql:host=n4m3x5ti89xl6czh.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=tt1bqatv5vie1w94","ip2wg0u4ijy736k4","j8uaormv2lstoxjl");
				
				}
catch(PDOException $e){
				echo "failed"; echo $e -> getMessage();
				}
$Data = $dbase ->prepare("SELECT * FROM users WHERE email='$user'");
$Data ->execute();
$Data = $Data -> fetchAll();
$firstName= $Data [0]['firstname'];
$lastName= $Data [0]['lastname'];
$emailAddress= $Data [0]['email'];
$password= $Data [0]['password'];
$role= $Data [0]['type_of_access'];
//echo $firstName . "<br>" . $lastName . "<br>" . $emailAddress . "<br>"  . $password . "<br>"  . $role . "<br>";

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
	.personal-data{
		display: grid;
		grid-template-columns: repeat(4,20vw);
		grid-template-areas: "personaldatalabel1 personaldatalabel1- personaldatalabel2 personaldatalabel2-" "personaldatalabel3 personaldatalabel3- personaldatalabel4 personaldatalabel4-" "personaldatalabel5 personaldatalabel5- change-pass .";
		margin: 20px 0;
		grid-row-gap: 20px;
        grid-column-gap:4vw;
		justify-content: center;

	}
    @media only screen and (max-width:1100px){
        .personal-data{
		grid-template-columns: repeat(4,20vw);
		grid-template-areas: "personaldatalabel1 personaldatalabel1- personaldatalabel2 personaldatalabel2-" 
        "personaldatalabel3 personaldatalabel3 personaldatalabel3 personaldatalabel3" 
        "personaldatalabel3- personaldatalabel3- personaldatalabel3- personaldatalabel3-" 
        "personaldatalabel4 . personaldatalabel4- ." 
        "personaldatalabel5 personaldatalabel5- change-pass .";

	    }

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

    <div class="personal-data">
		<label style="grid-area: personaldatalabel1">الاسم الأول </label>
		<label style="grid-area: personaldatalabel1-"><?php echo $firstName ?></label>
		<label style="grid-area: personaldatalabel2">اسم العائلة </label>
		<label style="grid-area: personaldatalabel2-"><?php echo $lastName ?></label>
		<label style="grid-area: personaldatalabel3;word-break: break-word;">البريد الالكتروني </label>
		<label style="grid-area: personaldatalabel3- ; word-break: break-word;"><?php echo $emailAddress ?></label>
		<label style="grid-area: personaldatalabel4">نوع العضوية  </label>
		<label style="grid-area: personaldatalabel4-"><?php echo $role ?></label>
		<label style="grid-area: personaldatalabel5">كلمة المرور</label>
		<label style="grid-area: personaldatalabel5-"><?php echo "******" ?></label>
		<button style="grid-area: change-pass;"><a href="changepassword.php" style="cursor: pointer;">تغيير كلمة المرور  </a></button>

	</div>
	<label style="color:green;font-weight: bold;text-align: center; margin-bottom:5px;display:<?php if(isset($_SESSION['passwordChangedSucsses'])){echo 'block';}else{echo 'none';} ?>;"><?php if($_SESSION['passwordChangedSucsses'] !=0){echo "تم تغيير كلمة المرور ";} ?></label>


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