<?php
    include_once 'header.php';
?>
        
        <section class="main-container">
            <div class="main-wrapper">
                <?php
                    if(isset($_SESSION['u_name'])){
                        echo "Welcome back: " . $_SESSION["u_name"] . "!";
                    }
                ?>
                <h1 style="text-align:center; font-size: 35px; padding-right:175px;";>Teacher's Attendance Home Page!</h2><br>
               
                <form style="text-align:right;" action="includes/dbcStuReg.php" method="post">
                <input type="text" name="fullname" placeholder="fullname" ><br>
                <input type="text" name="PID" placeholder="PID"><br>
                <input type="text" name="uniqueID" placeholder="uniqueID" ><br>
                <button type="submit" name="submit" >Student Registration</button>
                </form>
               
                
                
            
            
                <img src="hands_raised.png">
                <br><br>
                <p>     Here at attendance incorporated we strongly believe in customer satisfaction.<br> Thus,
                    if you have an issue with our attendance software take it up with our<br> IT guy. We pay
                    him somewhat well so im sure he will handle your complaint<br> without bashing his keyboard
                    to hard. Also, if you really don't like us and think our<br> software could be done better
                    then do it yourself. Or, if you quote on quote <br>'dont have time' go ahead and require 
                    iclickers they are quote on quote 'great'!
                    </p><br><br>
            </div> 
        </section>
<?php
    include_once 'footer.php';
?>
