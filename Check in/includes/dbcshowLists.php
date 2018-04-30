
<?php
session_start(); 
if(isset($_SESSION['u_name'])){
	include 'dbc.php'; ?>
	<p> <a href = "../Index.php"> Homepage </a></p>
	<form id="form1" name="form1" method="post" action="<?php echo $PHP_SELF; ?>">
	<?php
	$email = mysqli_real_escape_string($conn, $_SESSION['u_email']);
	//Changed
	$query = "SELECT DISTINCT class FROM reg_test WHERE teacher_email = '$email'";
	$result = mysqli_query($conn, $query);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck == 0){
		echo 'No classes found, please go to <a href="dbcCreateLists.php">attendance</a> to add a class <br>';
	}
	echo "Enter the date in the format mm/dd/yyyy: ";
	echo '<input type="text" name="date1" > /
	<input type="text" name="date2" > /
	<input type="text" name="date3" > <br>';
	
	
	$options = "";
	while($row = mysqli_fetch_array($result)){
		$options = $options."<option>$row[0]</option>";
	}
	echo '<select name = "class" id="form">';
	echo $options;
	echo '</select>';
	echo '<button type="submit" name="submit">Enter</button></form>';
	$date1 = mysqli_real_escape_string($conn, $_POST['date1']);
	$date2 = mysqli_real_escape_string($conn, $_POST['date2']);
	$date3 = mysqli_real_escape_string($conn, $_POST['date3']);
	$date = $date1 . $date2 . $date3;
	$class = mysqli_real_escape_string($conn, $_POST['class']);
	
	$query = "SELECT reg_test.pid FROM reg_test, reg_student WHERE class = '$class' AND reg_test.pid = reg_student.PID"; 
	$result = mysqli_query($conn, $query);
	while($pid = mysqli_fetch_array($result)){
		$query2 = "SELECT id FROM broadcasted WHERE id = $pid[0]";
		$result2 = mysqli_query($conn, $query2);
		if($result2 != 0){
			$query3 = "UPDATE reg_test SET is_here = '1' WHERE reg_test.pid = $pid[0]";
			mysqli_query($conn, $query3);
		}
		else{
			$query3 = "UPDATE reg_test SET is_here = '0' WHERE reg_test.pid = $pid[0]";
			mysqli_query($conn, $query3);
		}
	
	}
	
	echo "Class: ";
	echo $class;
	echo "<br> Date: ";
	echo $date;
	echo "<br><table>
		<tr> 
		<th>Student Name</th>
 	     <th>PID</th>
	     <th>Here?</th></tr>";
	$sql = "SELECT student_name, pid, is_here FROM reg_test WHERE class ='$class'";
	$result = mysqli_query($conn, $sql);
	$rows = mysqli_num_rows($result);
	if ($rows){
		while ($row = mysqli_fetch_array($result)){
			echo '<tr><td>';
			echo '' .$row['student_name'] . '';
			echo '</td><td>';
			echo '' .$row['pid'] . '';
			echo '</td><td>';
			echo '  ' .$row['is_here'] . '';
			echo '</td></tr>';
	
		}
	}
	echo '</table>';


}
else{
echo 'You are not logged in, please return to the <a href = "../Index.php"> Homepage </a> and sign in';
}
?>
