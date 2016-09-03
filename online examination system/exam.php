<html>
<title>exam</title>
<center><h1>Exam</h1><center>
<body style="background-color:#5F9EA0;">
<image src="logo.jpg" height=100px width=100px style="position:absolute; right:5%; bottom:5%;">
<div style="position : absolute; top : 60px ; right : 470px; width:400px; height:450px; border:5px ;border:solid 2px black;background-color:#E8E8E8;text-align:center; ">
<?php
error_reporting(0);
$xx = 0;
if(!empty($_POST["id"])&&!empty($_POST["roll"]))
{
$id=$_POST["id"];
$roll=$_POST["roll"];
$handle=file("examdata.txt");
$count=0;
$flag=0;
$qid = 0 ;
$answer=array();
echo "<form action = 'exam.php' method = 'post'>";
echo "<br><br>";
foreach($handle as $list)
{
	if($flag==1)
	{
		$filename=trim($list);
		$handle1=file($filename);
		
		foreach($handle1 as $list1)
		{
				
				$count++;
				if($count%2==0)
				{
					$xx++;
					echo $list1;
					echo 
					"
					<br>
					<input type='text' name=".$xx.">
					<input type = 'hidden' name = 'id' value = $id>
					<input type = 'hidden' name = 'roll' value = $roll>
					<input type = 'hidden' name = 'qid' value = $qid>
					
					<br> ";
					echo "<br>";
					
				}
				$qid = trim($list1);
		}
		$flag = 0;
		fclose($handle1);
	}
	if(trim($list)==$id)
	{
		$flag=1;
	}
	
}
    echo "<br><br>";
	echo "<input type = submit value='Submit'>";
	$lineno=0;$flag=0;
	$read = fopen("student.txt",'r');
	$write = fopen("student.tmp",'w');
	$replaced = false;
		while(!feof($read))
	{	
		if($lineno==9) $lineno = 0;
		$lineno++;
		
		$line=fgets($read);
		
		if(trim($line)==$roll && $lineno%10 == 3)
		{
			$flag=1;
		}
		if($lineno%(3+$id)== 0 && $flag==1)
		{
			$line = "1\n";
			$replaced = true;
			$flag=0;
		}
		fputs($write, $line);
	}
	fclose($read);
	fclose($write);
	if($replaced)
	{
		rename('student.tmp','student.txt');
	}
	else
	{
		unlink('student.tmp');
	}
		echo "</form>";
	fclose($handle);

}

?>

<?php
	$count = 1;
	$qid=1;
	if(!empty($_POST[$count]))
	{
		
		$handle = fopen("answers.txt",'a');
		while(!empty($_POST["$count"]))
		{
			fwrite($handle,"\n");
			fwrite($handle,$_POST['roll']);
			fwrite($handle,"\n");
			fwrite($handle,$_POST['id']);
			fwrite($handle,"\n");
			fwrite($handle,$qid);
			fwrite($handle,"\n");
			fwrite($handle,$_POST[$count]);
			$qid = $qid + 1;
			$count = $count + 1 ;
		}
		fclose($handle);
		header("location:login.php");
	}

?>
</div>
</html>