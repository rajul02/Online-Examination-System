<title>stpage.php</title>
<body style="background-color:#5F9EA0;">
<image src="logo.jpg" height=100px width=100px style="position:absolute; right:5%; bottom:5%;">
<div style="position : absolute; top : 60px ; right : 500px; width:400px; height:550px; border:5px ;border:solid 2px black;background-color:#E8E8E8;text-align:center; ">
<?php
error_reporting(0);
	$roll = $_POST["roll"];
	$check =$_POST["check"];
	//echo $check; echo $roll;
	if($check==$roll)
	{
		echo "<h3>Welcome Roll No. ".$roll."</h3>";
	$handle = file("student.txt");
	$count = 0;$flag=0;
		foreach($handle as $info)
		{
			$count++;
			if($count == 10)
			{
				$count =1;
			}
			
			if( $count%10==3 && trim($info)==$roll )
			{
				//echo "Roll No:";
				//echo $info;
				echo "<br>";
				$count2=0;
				foreach($handle as $list1)
				{
					if(trim($list1)==$roll) $flag=1;
					
					$count2++;
					if($count2 == 10)
					{
						$count2 =1;
					}
					if($flag==1)
					{
						if(trim($list1)==1 && $count2 > 3 )
					{	
						echo "Class test ".($count2-3);
						echo "<br>Exam Given";
						echo "<br><br><br>";
						
					}
					else
					if(trim($list1)==0 && $count2 > 3)
					{
						echo "Class test ".($count2-3);
						$ark=$count2-3;
						echo "<form action='exam.php' method ='POST'><input type='hidden' name='id' value=$ark>
																	<input type='hidden' name='roll' value=$roll>
																	<input type='submit' value='Give exam'>
							</form>";
						echo "<br>";
						
					}
					else if(trim($list1)==-1)
							break 2;
					}
					
				
						
			}
		}
		
	}
	

echo "<form action='login.php' style = 'position : absolute ; bottom : 5px; right : 15px;'><input type='submit' value='Logout'></form>";
	}
	else
echo "You are unauthorized to access this page,<a href ='login.php'>click here</a> to be redirected" ;		
	
	
?>
</div>