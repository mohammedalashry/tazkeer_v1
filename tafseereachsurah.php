<?php
$file=fopen("tafseer/tafseer_summary.txt","r");
$string=fread($file,filesize("tafseer/tafseer_summary.txt"));
$array= explode("****",$string);
$file2=fopen("tafseer/surahs.json","w");
fwrite($file2,'{ "tafseer":[');
for ($i=0;$i<=113;$i++){
fwrite($file2,'{'.'"id":'.$i.',"text":"'.$array[$i].'"},');
}
fwrite($file2,"]}");

?>
<html dir="rtl">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Language" content="ar-sa">


</head>
<body>

</body>
    </html>