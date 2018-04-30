<!DOCTYPE html>
<html>
<?php
session_start();
echo '
<form action = "dbcCreateLists2.php" method = "post">
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



?>
 