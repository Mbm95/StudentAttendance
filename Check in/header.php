<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <tittle>Teacher Attendance</tittle>
    <link rel="stylesheet" type="text/css" href="style.css" >
</head>
    
    <body>
        <header>
            <nav>
                <div class ="main-wrapper">
                    <ul>
                        <li><a href="Index.php">Home</a>&nbsp&nbsp&nbsp&nbsp</li>
                        <li><a href="includes/dbcCreateLists.php">Attendance</a>&nbsp&nbsp&nbsp&nbsp</li>
                        <li><a href="includes/dbcshowLists.php">Teacher Lists</a></li>
                    </ul>
                    <div class ="nav-login">
                        <?php
                            if(isset($_SESSION["u_name"])){
                            echo '<form action="includes/dbcLogout.php" method="post">
                            <button type="submit" name="submit">Logout</button>      
                            </form>';    
                            }
                        
                            else{
                              echo ' 
                            <form action="includes/dbcLogin.php" method="post">
                            <input type="text" name="email" placeholder="Email">
                            <input type="password" name="pwd" placeholder="password">
                            <button type="submit" name="submit">Login</button>
                            </form>
                            <a href="register.php">Register</a>';      
                            }
                        ?> 
                    </div>
                </div>
            </nav>
        </header>