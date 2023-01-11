<?php
    include_once "./adminHeader.php";

?>


<h2>Log In.</h2>

<form action="/admin/includesAdmin/adminLogin.inc.php" method="post" class="login-form">

<div class="login_details">
    <input type="text" name="adminId" id="" class="admin_id" placeholder="Index Number/Email">
    <input type="password" name="admin_password" id="" class="login-password" placeholder="Password">
</div>
    
<div class="buttons">
    <button type="submit" name="login_button" class="logIn_button">Log In</button>
</div>


</form>


<?php

include_once "./adminFooter.php";


?>