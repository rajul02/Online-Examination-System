              <title>interm.php</title>
<?php
	
	$excount = $_COOKIE['ex'];
	if($_COOKIE['ex']== null)
	{
			$excount = 3;
			setcookie('ex',3,time()+(86400 * 30));
			
	}
	
	$sname = $_POST["sname"];
	$spswd = $_POST["spswd"];
	$sroll = $_POST["sroll"];
	$handle = fopen("student.txt",'a');
	if(!empty($sname) && !empty($spswd) && !empty($sroll))
	{
		fwrite($handle, $sname."\n");
		fwrite($handle, $spswd."\n");
		fwrite($handle, $sroll."\n");
		for($i=1 ; $i <= $excount ; $i++)
			fwrite($handle,"0\n");
		for($i=$excount ; $i<= 5 ; $i++)
			fwrite($handle,"-1\n");
		fclose($handle);
		header("location:admin.php");
	}
	
	$esub = $_POST["esub"];
	$eid = $_POST["eid"];
	if(!empty($_POST["eid"])&&!empty($_POST["esub"]))
	{
	$excount = $_COOKIE['ex']+1;
	setcookie('ex',$excount,time()+(86400*30));
	$handle = fopen($esub.".txt",'a');
	fclose($handle);
	$read = fopen("examdata.txt",'a');
	fwrite($read,$eid."\n");
	fwrite($read,$esub.".txt\n");
	fclose($read);
	$lineno=0;
	$read = fopen("student.txt",'r');
	$write = fopen("student.tmp",'w');
	$replaced = false;
	while(!feof($read))
	{	
		if($lineno==9) $lineno = 0;
		$lineno++;
		$line=fgets($read);
		if($lineno%(3+$excount)== 0)
		{
			$line = "0\n";
			$replaced = true;
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
		header("location:admin.php");
}

	$count = 0;
	$ques = $_POST["ques"];
	$qid = $_POST["qid"];
	$eeid = $_POST["eeid"];
	if(!empty($ques) && !empty($qid) && !empty($eeid))
	{
		
		$hand = file("examdata.txt");
		foreach($hand as $leg)
		{
			if($count == 1)
				{
					$filename = trim($leg);
					echo $leg;
					$count = 0;
				}
			if(trim($leg)==$eeid) $count = 1;
			
		}		
		$handle1 = fopen($filename,'a');
		fwrite($handle1,$qid."\n");
		fwrite($handle1,$ques."\n");
		fclose($hand);
		fclose($handle1);
		header("location:admin.php");
	
	}
	
	?>
	
	
	