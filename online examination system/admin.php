<title>Admin Page</title>
<body style="background-color:silver;">
<image src="logo.jpg" height=100px width=100px style="position:absolute; right:5%; bottom:5%;">
<CENTER><h1>Welcome Admin!</h1></center>
<hr/>
<div style = "position : absolute; top : 100px; left : 10px;width:300px; height:250px; border:5px ;border:solid 2px black;background-color:#B1BDCD;">
	<center><h2>Add Student</h2>
	<form action = "interm.php" method= "POST">
	Enter student name:<input type = "text" name = "sname" required><br>
	<br>
	Enter student password:<input type = "text" name = "spswd" required><br><br>
	Enter student roll no:<input type = "text" name = "sroll" required><br><br>
	<input type = "submit" value = submit>
	</form></center>
</div>
<br><br><br>
<div style = "position : absolute ; top : 40 px ; left : 38% ;width:300px; height:200px; border:5px ;border:solid 2px black;background-color:#B1BDCD;">
	<center><h2>Add Exam</h2>
	<form action = "interm.php" method= "POST">
	Enter exam subject:<input type = "text" name = "esub" required><br><br>
	Enter exam id:<input type = "text" name = "eid" required><br><br>
	<input type = "submit" value = submit>
	</form></center>
</div>
<br><br><br>

<div style = "position : absolute; top : 100px ; right : 10px; width:300px; height:250px; border:5px ;border:solid 2px black;background-color:#B1BDCD; ">
	<center>
	<h2>Add Question</h2>
	<form action = "interm.php" method= "POST">
	Enter question:<input type = "text" name = "ques" required><br><br>
	Enter question id:<input type = "text" name = "qid" required><br><br>
	Enter exam id:<input type = "text" name = "eeid" required><br><br>
	<input type = "submit" value = submit>
	</form></center>
</div>
<br><br><br>
<?php
echo "<div style = 'position : absolute; bottom : 50px; left: 225px;width:400px; height:150px; border:5px ;border:solid 2px black;background-color:#B1BDCD;  '><center><h2>Report for a particular student</h2>";
echo "<form action='report1.php' method='POST'>Enter roll no:<input type='number' name='roll' required><input type='submit' value='submit'></form></center></div>" ;


echo "<div style = 'position : absolute; bottom : 50px; right: 225px;width:400px; height:150px; border:5px ;border:solid 2px black;background-color:#B1BDCD;  '><center><h2>Report for a particular exam id</h2>";
echo "<form action='report2.php' method='POST'>Enter exam id: <input type='number' name='id' required><input type='submit' value='submit'></form></center></div>" ;

echo "<br><br><br>";

echo "<form action='login.php' style = 'position: absolute; top :25px; right: 35px;'><input type='submit' value='Logout'></form>";
?>