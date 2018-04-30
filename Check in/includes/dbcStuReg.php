<?php

if(isset($_POST['submit'])){
    
    include_once 'dbc.php';
    
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $PID = mysqli_real_escape_string($conn, $_POST['PID']);
    $uniqueID = mysqli_real_escape_string($conn, $_POST['uniqueID']);
    
    //error handlers.
    //check for empty fields
    if(empty($fullname) || empty($PID) || empty($uniqueID)){
        header("Location: ../Index.php?signup=empty");
        exit();
    }
    else{
        //check if input characters are valid
        if(!preg_match("/^[a-zA-Z \s]+$/", $fullname)){
        header("Location: ../Index.php?signup=invalid");
        exit();
        }
            else{
                $sql = "SELECT * FROM reg_student WHERE PID='$PID'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
            
                if($resultCheck > 0){
                 header("Location: ../Index.php?signup=usertaken");
                 exit();    
                }
                else{
                    $sql = "INSERT INTO reg_student (name, PID, uniqueID) VALUES ('$fullname','$PID','$uniqueID');";
                    mysqli_query($conn, $sql);
                    header("Location: ../Index.php?signup=success");
                    exit();   
                    
                }
            }
        }
    }

else{
    header("Location: ../Index.php");
    exit();
}