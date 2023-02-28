<?php
    include_once "header.php";

?>


<h2>Log In.</h2>

<form action="/php-tuts/form/loginSys/includes/logIn.inc.php" method="post" class="login-form">

<div class="login_details">
    <input type="text" name="stud_email" required id="" class="student_Id" placeholder="Email">
    <input type="password" name="login_password" required id="" class="login-password" placeholder="Password">
</div>
    
<div class="buttons">
    <button type="submit" name="login_button" class="logIn_button">Log In</button>
</div>


</form>


<?php

include_once "footer.php";


?>