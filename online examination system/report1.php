<image src="logo.jpg" height=100px width=100px style="position:absolute; right:5%; bottom:5%;">
<body style="background-color:#5F9EA0;">
<div style="position : absolute; top : 60px ; right : 500px; width:400px; height:450px; border:5px ;border:solid 2px black;background-color:#E8E8E8;text-align:center; ">
<?php
$roll=$_POST["roll"];
$handle=file("student.txt");
$lineno=0;
$flag=0;
$count=0;
$count1=0;
echo "<br><br><b>Welcome Roll no. </b>".$roll;
echo "<br><br>";
foreach($handle as $line)
{
	$lineno++;
	if($lineno==10)
		$lineno=1;
	
	
	if($flag==1)
	{
		if(trim($line)==0)
		{
			$count++;
			echo "Class Test ".($lineno-3);
			echo ":\tExam not given";
			echo "<br><br>";
		}
		else if(trim($line)==1)
		{
			$count1++;
			echo "Class Test ".($lineno-3);
			echo ":\tExam given";
			echo "<br><br>";
		}
		else
		{
			$flag=0;
			echo "No of exams given:\t ".$count1;
			echo "<br> No of exams not given:\t".$count;
			echo "<br><br>:\t:\tEND OF REPORT";
			break;
		}
			
		
	}
		if($lineno%10==3 && trim($line)==$roll)
	{
		$flag=1;
		
	}
	
}

echo "<br><br>";
echo "<form action='login.php'><input type='submit' value='Logout'></form>";
?>
</div>