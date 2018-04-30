<? php

//cop4331-attendance.com
  $uqid = $_POST["ID"];
  $date = $_POST["date"];
  $email = $_POST["email"];
  $class = $_POST["class"];

  $username = "root";
  $password = "";
  $host = "localhost";
  $db = "big_proj";

  $con = mysqli_connect($host, $username, $password, $db);
  $mysqli = new mysqli($host, $username, $password, $db);

  //Check if student is registered
  $result = $mysqli->query("SELECT " .$uqid. "FROM reg_student WHERE ID = ".$uqid.);

  //If not registered, then do nothing
  if($result->num_rows == 0 )
  {
    return ;
  }

  //If he is registered, then continue
  else
  {
    //Check if date already exisits
    $result = $mysqli->query("SELECT ".$date." FROM broadcasted WHERE ID = ".$uqid.);

    //If one doesn't
    if($result->num_rows == 0)
    {
        $mysqil->querey("ALTER TABLE 'broadcasted' ADD COLUMN `".$date."` BOOL NOT NULL;");
        $mysqli->query("UPDATE broadcasted SET `".$date."` = true WHERE (ID = ".$uqid." AND class = ".$class." AND teacher_email = ".$email.");");
    }

    //If one already exisits
    else
      $mysqli->query("UPDATE broadcasted SET `".$date."` = true WHERE (ID = ".$uqid." AND class = ".$class." AND teacher_email = ".$email.");");
  }

  $mysqli->close();

?>
