<?php
session_start();
if (!isset($_SESSION["unique_id"])) {
    header("signin.php");
}

require("model/database/users_db.php");
include("header.php");


?>
<div class="container">

    <?php
    $id = $_GET["id"];
    $user = get_user_by_uniqueID($id); ?>
    <span class="id_receiver" style="display:none"><?= $id ?></span>
    <div>
        <img src="icons/R.png" alt="" style="width:20px" class="left">
        <img src="model/images/<?= $user["img"]; ?>" alt="">
        <div>
            <h4><?= $user["fname"] . " " . $user["lname"]; ?></h4>
            <p> <?= $user["status"]; ?></p>
        </div>
    </div>


    <div class="msgs">

    </div>
    <div>
        <form action="#" method="POST">
            <span></span>
            <input type="text" placeholder="Type a message here">
            <button><i class="fab fa-telegram-plane"></i></button>
        </form>
    </div>
</div>

<script src="Controller/chat.js"></script>
<?php
include("footer.php"); ?>