<html>
<title>Answers</title>
<?php
echo "hello";
$answer=$_GET["answer1"];
echo $_GET["answer1"][0];
/*for($i=0;$i<5;$i++)
{
	echo $answer[$i];
	$handle=fopen("answers.txt",'a');
	fwrite($handle,$answer[$i]);
	fclose($handle);
}*/
//header("location:answers.php");
?>
</html>