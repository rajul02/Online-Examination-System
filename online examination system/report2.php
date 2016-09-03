<image src="logo.jpg" height=100px width=100px style="position:absolute; right:5%; bottom:5%;">
<body style="background-color:#5F9EA0;">
<div style="position : absolute; top : 60px ; right : 500px; width:400px; height:450px; border:5px ;border:solid 2px black;background-color:#E8E8E8;text-align:center; ">
<?php
$id=$_POST["id"];

echo "<br><br><b>Subject id:</b> ".$id;
$handle=file("student.txt");
$count=0;
$count1=0;
$lineno=0;
$flag=0;
echo "<br><br>";
foreach($handle as $line)
{
	$lineno++;
	if($lineno==10)
	{
		$lineno=1;
	}
	if($lineno%10==3)
		$flag=trim($line);
	if($lineno%10==($id+3)&&trim($line)==1)
	{
		$count1++;
		echo "<br>";
		echo $flag;
		echo " :\t Exam given";
		
	}
	else if($lineno%10==($id+3)&&trim($line)==0)
	{
		$count++;
		echo "<br>";
		echo $flag;
		echo " :\t Exam not given";
	}
	
}
echo "<br><br><br>No. of students who have given exam:\t".$count1;
echo "<br>No. of students who didn't gave exam:\t".$count;
echo "<br><br><br><br><b> : : END OF REPORT</b>";

echo "<br><br><br><br>";
echo "<form action='login.php'><input type='submit' value='Logout'></form>";
?>
</div>