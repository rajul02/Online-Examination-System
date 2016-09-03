<title>inter page</title>
<body style="background-color:lightgrey;">
<image src="logo.jpg" height=100px width=100px style="position:absolute; right:5%; bottom:5%;">
<?php
error_reporting(0);
$username = $_POST["uname"];
$password = $_POST["pswd"];
$temp=0;

if($username == "admin" && $password == "qwerty") header("location:admin.php");
else
{
	$count = 0;
	$flag = 0; $x = 0;
	$handle = file("student.txt");
	foreach($handle as $sname)
	{
		$count++;
		//echo $flag;
			
				
		if($count==10) $count = 1;
		if (trim($sname) == $username && $count == 1) $flag = 1;
		if(trim($sname) == $password && $count == 2 ) $flag++;
		if($count%10==3 && $flag ==2) {$check=trim($sname);
		//echo $check;
		$temp=1;}	
		//echo $flag;
		if($flag == 2&& $temp==1) 
		{
			
			$flag = 0;
			//echo $check;
			echo "<form action = 'stpage.php' method = 'POST'>
					Enter your roll number to verify:<input type = 'number' name = 'roll'>
					<input type = 'hidden' name = 'check' value = $check>
					<input type = submit>
					</form>"; $x = 1;
			
		}	
		//echo $check;
	}
}
if($x!=1)
echo "You are unauthorized to access this page,<a href ='login.php'>click here</a> to be redirected" ;
?>


<?php
/*



student.txt

namea
pswwww
roll no
nameb
werw
roll
*/
?>