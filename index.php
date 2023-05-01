<?php
@ob_start();
session_start();

if (isset($_SESSION["unique_id"])) {
    header("Location:users.php");
}

?>
<?php include("header.php"); ?>

<div class="container sign up">
    <div class="part left">
        <h1>Chat App</h1>
        <div class="form">
            <img src="images/graphics-2.png" alt="">
        </div>

    </div>
    <div class="part right">
        <h1>Sign Up</h1>
        <div class="form">
            <div class="error"></div>
            <form action="." method="post" enctype="multipart/form-data" autocomplete="off" class="signup-form">

                <div class="name">
                    <div class="field input">
                        <label>First Name</label>
                        <input type="text" name="fname" placeholder="First name" required>
                    </div>
                    <div class=" field input">
                        <label>Last Name</label>
                        <input type="text" name="lname" placeholder="Last name" required>
                    </div>
                </div>
                <div class="field input">
                    <label>Email Address</label>
                    <input type="text" name="email" placeholder="Enter your email">
                </div>
                <div class="field ">
                    <label>Password</label>
                    <div class="password">
                        <input type="password" name="password" placeholder="Enter new password">
                      
                    </div>
                </div>
                <div class="field image">
                    <label class="file-upload-label">Select Image</label>
                    <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" class="file-upload">
                </div>
                <div class="button">
                    <button type="submit" name="submit">Continue to Chat</button>
                </div>
            </form>
            <p>Already signed up? <a href="signin.php">Login now</a></p>
        </div>
    </div>
</div>
<script src="Controller/signup.js"></script>
<?php include("footer.php"); ?>