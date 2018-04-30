
<?php
session_start();
//if came from previous session and was logged in
if(isset($_SESSION['u_name'])){
        
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
	echo '<p> <a href = "../Index.php"> Homepage </a></p>';
	echo "Student(s) entered sucessfully!";
        
 }

//if came from previous session and wasnt logged in
else{
    echo "Error 1011011101101101: This isn't free! We need your data so we can zucc ya!
     <ul><li><a href='../register.php'>Go back?</a></li></ul>";
}

?>