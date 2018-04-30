<?php

if(isset($_POST['submit'])){
    
    include_once 'dbc.php';
    
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    
    //error handlers.
    //check for empty fields
    if(empty($fullname) || empty($email) || empty($pwd)){
        header("Location: ../register.php?signup=empty");
        exit();
    }
    else{
        //check if input characters are valid
        if(!preg_match("/^[a-zA-Z \s]+$/", $fullname)){
        header("Location: ../register.php?signup=invalid");
        exit();
        }
        else{
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: ../register.php?signup=bademail");
            exit();     
            }
            else{
                $sql = "SELECT * FROM reg_teachers WHERE email='$email'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
            
                if($resultCheck > 0){
                 header("Location: ../register.php?signup=usertaken");
                 exit();    
                }
                else{
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    //Insert into db
                    $sql = "INSERT INTO reg_teachers (name, email, password) VALUES ('$fullname','$email','$hashedPwd');";
                    mysqli_query($conn, $sql);
                    header("Location: ../register.php?signup=success");
                    exit();   
                    
                }
            }
        }
    }
}
else{
    header("Location: ../register.php");
    exit();
}

           