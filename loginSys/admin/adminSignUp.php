<?php
    include_once "./adminHeader.php";

?>


<section class="signup">
    <h2>Sign Up</h2>

    <form action="includesAdmin/adminSignup.inc.php" method="POST" class="login-form">



    <div class="personalInfo">
        <input type="text" name="fullName" placeholder="Enter your Full Name" class="admin_name">
        <input type="text" name="adminId" placeholder="Admin ID" id="" class="admin_id">
        <input type="email" name="admin_email" placeholder="Email" id="" class="admin_email">
    </div>


    <div class="passwords">
        <input type="password" name="admin_passwrd" placeholder="Create a Password" id="">
        <input type="password" name="confirm_passwrd" placeholder="Confirm Password" id="">
    </div>
    <div class="buttons">
        <button type="submit" name="submit" class="signupButtons">Sign Up</button>
    </div>
    </form>
</section>

<?php
    if (isset($_GET["error"])){

        if ($_GET["error"] == "emptyinput"){
        echo "<p>You have left some required fields empty</p>";
    }
    if ($_GET["error"] == "adminEmail"){
        echo "<p>Your email is invalid.</p>";
    }
    if ($_GET["error"] == "invalidadminID"){
        echo "<p>Your username is invalid. Input only numbers and alphabets.</p>";
    }
    if ($_GET["error"] == "passwordMismatch"){
        echo "<p>The passwords do not match. try again.</p>";
    }
    if ($_GET["error"] == "adminalreadyexists"){
        echo "<p>This admin already exists.</p>";
    }
    }
?>



<?php

include_once "./adminFooter.php";


?>