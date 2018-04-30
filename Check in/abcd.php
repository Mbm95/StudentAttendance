<? php

  $post = json_decode(file_get_contents("php://input"), true);

// getting the information from the array
// in the android example I've defined only one KEY. You can add more KEYS to your app

  $email = $post['email'];

  $username = "root";
  $password = "";
  $host = "localhost";
  $db = "big_proj";

  $conn = new mysqli($host, $username, $password, $db);

  // Check connection
  if ($conn->connect_error)
  {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql = "UPDATE testy SET here = true WHERE email = ".$email.;

  if ($conn->query($sql) == TRUE)
  {
      echo "Record updated successfully";
  }
  else
  {
      echo "Error updating record: " . $conn->error;
  }

  $conn->close();

?>
