<?php
    
    $dsn ='mysql:host=localhost;dbname=student';
    $username = 'user';
    $password = 'password';
    try{
		$db =new PDO($dsn,$username,$password);
		echo'<p>You are connected to the database!</p>';
	}
	catch(PDOException $e){
		$error_message = $e->getMessage();
		echo'<p>Error message: $error_message</p>';
	}
	$queryAllStud = 'SELECT * FROM student';
	
	 
{
	if(isset($_POST['btn1']))
$queryAllStud = 'SELECT * FROM student ORDER BY gpa ASC';
}
if(isset($_POST['btn2'])) 
{
$queryAllStud = 'SELECT * FROM student ORDER BY gpa DESC';
}
if(isset($_POST['btn3'])) 
{
$queryAllStud = 'SELECT * FROM student ORDER BY last_name ASC';
}
if(isset($_POST['btn4'])) 
{
$queryAllStud = 'SELECT * FROM student ORDER BY last_name DESC';
}
	$stmt1= $db->prepare($queryAllStud);
	$stmt1-> execute();
	$student=$stmt1->fetchAll();
	$stmt1->closeCursor();
	
   ?><!DOCTYPE html>
<html>
<head>
   <title> day2</title>
   <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
 <form name="f1" action="day2.php" method="post">
       <table>
	   <tr>
	   <th>Student_id</th>
	   <th>First_name</th>
       <th>Last_name</th>
       <th>Email</th>
       <th>GPA</th>		  
         </tr>
  <?php foreach($student as $student):?>
  <tr>
<td><?php echo $student['student_id'];?></td>
<td><?php echo $student['first_name'];?></td>
<td><?php echo $student['last_name'];?></td>
<td><?php echo $student['email'];?></td>
<td><?php echo $student['gpa'];?></td>
	   </tr>
  <?php endforeach;?> 
  </table>
  <input type="submit" name="btn1" id="btn1" value="Sort GPA(A-Z)">
	<input type="submit"name="btn2" id="btn2"  value="Sort GPA(Z-A)">
	<input type="submit" name="btn3" id="btn3" value="Sort Last(A-Z)">
	<input type="submit" name="btn4" id="btn4" value="Sort Last(Z-A)">
	</form>
</body>
</html>