<?php
session_start();

if (isset($_SESSION["unique_id"])) {
    header("Location:users.php");
}

?>
<?php include("header.php"); ?>

<div class="container">
    <h1>Realtime Chat App</h1>
    <div class="error"></div>
    <form action="." method="post" enctype="multipart/form-data" autocomplete="off" class="signup-form">
        <div class="error-text"></div>
        <div class="name">
            <div class="input">
                <label>First Name</label>
                <input type="text" name="fname" placeholder="First name" required>
            </div>
            <div class="input">
                <label>Last Name</label>
                <input type="text" name="lname" placeholder="Last name" required>
            </div>
        </div>
        <div class="input">
            <label>Email Address</label>
            <input type="text" name="email" placeholder="Enter your email">
        </div>
        <div class="input">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter new password">
            <i class="fas fa-eye"></i>
        </div>
        <div class="image">
            <label>Select Image</label>
            <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg">
        </div>
        <div class="button">
            <button type="submit" name="submit">Continue to Chat</button>
        </div>
    </form>
    <p>Already signed up? <a href="signin.php">Login now</a></p>
</div>
<script src="Controller/signup.js"></script>
<?php include("footer.php"); ?>