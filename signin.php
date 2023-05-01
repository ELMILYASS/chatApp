<?php
@ob_start();
session_start();
if (isset($_SESSION["unique_id"])) {

    header("Location:users.php");
}

include("header.php"); ?>

<div class="container sign in">

    <div class="part left">
        <h1>Sign In</h1>

        <div class="form">
            <div class="error"></div>
            <form action="#" method="POST">

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
                <button>Go to Chat </button>

            </form>

            <p>Not yet signed up? <a href="index.php">Signup now</a></p>
        </div>
    </div>

    <div class="part right">
        <h1>Chat App</h1>
        <div class="form">
            <img src="images/graphics-2.png" alt="">
        </div>
    </div>
</div>
</div>
<script src="Controller/signin.js"></script>
<?php include("footer.php"); ?>