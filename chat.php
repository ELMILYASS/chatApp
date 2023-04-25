<?php
session_start();
if (!isset($_SESSION["unique_id"])) {
    header("signin.php");
}

require("model/database/users_db.php");
include("header.php");


?>
<div class="container chat">
   
    <?php
    $id = $_GET["id"];
    $user = get_user_by_uniqueID($id); ?>
    <span class="id_receiver" style="display:none"><?= $id ?></span>
    <div class="account friend">

        <img class="user-image" src="model/images/<?= $user["img"]; ?>" alt="">
        <div class="infos">
            <h2><?= $user["fname"] . " " . $user["lname"]; ?></h2>
            <p> <?= $user["status"]; ?></p>
        </div>
        <img src="./prod-pict-xmark_2.png" alt="" class="icon">
    </div>


    <div class="msgs">

    </div>
    <div class="send-message">
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