<?php
session_start();
if (isset($_SESSION["unique_id"])) {

    header("Location:users.php");
}

include("header.php"); ?>

<div class="container">
    <h1>Realtime Chat App</h1>
    <div class="error"></div>
    <form action="#" method="POST">
        <div class="input">
            <label>Email</label>
            <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="input">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password" required>
        </div>
        <button>Go to Chat </button>

    </form>

    <p>Not yet signed up? <a href="index.php">Signup now</a></p>
</div>
<script src="Controller/signin.js"></script>
<?php include("footer.php"); ?>