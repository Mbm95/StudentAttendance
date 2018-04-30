<?php
    include_once 'header.php';
?>
        
        <section class="main-container">
            <div class="main-wrapper">
                <h1 style="text-align:center; font-size: 40px; padding-right:225px;";>Sign-Up!</h2>
                <form class="register-form" action="includes/dbcRegister.php" method="post">
                  <input type="text" name="fullname" placeholder="Enter name...">
                  <input type="email" name="email" placeholder="Enter email...">
                  <input type="password" name="pwd" placeholder="Enter password...">
                  <button type="submit" name="submit">Register</button>
                </form>
            </div>
        </section>
<?php
    include_once 'footer.php';
?>