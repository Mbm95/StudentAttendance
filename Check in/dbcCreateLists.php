<!DOCTYPE html>
<html>
<?php
session_start();
if(isset($_SESSION['u_name'])){
echo '<p> <a href = "../Index.php"> Homepage </a></p>'; ?>
<form id="form1" name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
<?php
echo '
<input type="text" name="class" placeholder="Enter class name...">
<br>';
for($i = 0; $i < 30; $i++){
$a = $i + 1;
echo $a;
echo '
<input type="text" name="name[]" placeholder="Enter student name...">
<input type="text" name="pid[]" placeholder="Enter pid...">
<br>';
}

echo '
<button type="submit" name="submit">Enter</button> ';

       include 'dbc.php';

	$email = mysqli_real_escape_string($conn, $_SESSION['u_email']);

	for($i = 0; $i < 30; $i++)
	{
		$class = mysqli_real_escape_string($conn, $_POST['class']);
        	$name = mysqli_real_escape_string($conn, $_POST['name'][$i]);
    		$pid = mysqli_real_escape_string($conn, $_POST['pid'][$i]);
		if(!empty($class) && !empty($pid) && !empty($name)){
			$sql = "SELECT * FROM reg_test WHERE class ='$class' AND pid = $pid ";
           		$result = mysqli_query($conn, $sql);
           		$resultCheck = mysqli_num_rows($result);
			if($resultCheck == 0){
				$sql = "INSERT INTO reg_test (class, student_name, pid, teacher_email) VALUES ('$class', '$name', $pid, '$email')";
            			mysqli_query($conn, $sql);

			}

		}

	}

	echo "Student(s) entered sucessfully!";

 }


?>

