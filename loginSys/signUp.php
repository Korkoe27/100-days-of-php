<?php
    include_once "header.php";

?>


<section class="signup">
    <h2>Sign Up</h2>

    <form action="includes/signup.inc.php" method="POST" class="signup-form">


    <div class="studNames">
        <input type="text" name="firstName" placeholder="First Name" id="" class="firstName nameSignup" required>
        <input type="text" name="lastName" placeholder="Last Name" id="" class="lastName nameSignup" required>
        <input type="text" name="otherName" placeholder="Other Name" id="" class="otherName nameSignup">
    </div>

    <div class="personalInfo">
        <input type="text" name="studentId" placeholder="Index Number" id="" class="stud_id">
        <input type="text" name="programOfStudy" placeholder="Program of Study." id="" class="programOfStudy">
        <input type="tel" name="phoneNumber" placeholder="Phone Number" id="" class="phoneNum">
        

        <div class="gender">
            <label for="user_gender">Gender</label>
        <select name="user_gender" id="">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        </div>
        
        
        <input type="email" name="student_email" placeholder="Student Email" id="" class="student_email">
        <label for="dateOfBirth" class="user_dob">
            Date Of Birth <br>
            <input type="date" name="dateOfBirth" class="dob" id="">
        </label>
        
    </div>
    <div class="passwords">
        <input type="password" name="create_passwrd" placeholder="Create a Password" id="">
        <input type="password" name="confirm_passwrd" placeholder="Confirm Password" id="">
    </div>
    <div class="buttons">
        <button type="reset" class="signupButtons">Reset</button>
        <button type="submit" name="submit" class="signupButtons">Sign Up</button>
    </div>



    </form>
</section>


<?php

include_once "footer.php";


?>