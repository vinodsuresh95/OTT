<?php
require_once("includes/header.php");
?>
<div class="settingsContainer column">

    <div class="formSection">

        <form method="POST">

            <h2>User Details</h2>
            <?php
            $user = new User($con,$userLoggedIn);

            $firstName = isset($_POST["firstName"]) ?  $_POST["firstName"] : $user->getFirstName();

            echo $firstName;
            ?>
            <input type="text" name="firstname" placeholder="First Name" value="">

            <input type="text" name="lastname" placeholder="Last Name">

            <input type="phonenumber" name="phonenumber" disabled="true" maxlength="10" placeholder="Phonenumber">

            <input type="email" name="email" placeholder="Email">

            <input type="submit" name="saveDetailsButton" value="Save">

        </form>

    </div>

    <div class="formSection">

        <form method="POST">

            <h2>Update Password</h2>

            <input type="password" name="oldPassword" placeholder="Old Password">

            <input type="password" name="newPrassword" placeholder="New Password">

            <input type="password" name="Confirm Password " placeholder="Confirm Password">

            <input type="submit" name="updatePasswordButton" value="Save">

        </form>

    </div>


</div>