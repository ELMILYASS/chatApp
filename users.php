<?php include("header.php");
session_start();

if (!isset($_SESSION["unique_id"])) {
    header("Location:index.php");
}

require("model/database/users_db.php");
?>
<div class="container">
    <div>
        <?php
        update_user_id($_SESSION["unique_id"], "Active");
        $user = get_user_by_uniqueID($_SESSION["unique_id"]);

        ?>
        <img src="model/images/<?= $user["img"]; ?>" alt="">
        <div>
            <h4><?= $user["fname"] . " " . $user["lname"]; ?></h4>
            <p> <?= $user["status"]; ?></p>
        </div>
        <button>Logout</button>
    </div>
    <div>
        <div class="select-user">
            <p>Select an user to start chat</p>
            <i class="fas fa-search"></i>

        </div>
        <div class="search-user">

            <input type="text" placeholder="Search by name ...">
            <img src="./prod-pict-xmark_2.png" style="width:20px" alt="">
        </div>

        <div class="users_list">

        </div>
        <div class="search_users_list">

        </div>
    </div>
</div>
<script src="Controller/users.js"></script>

<?php include("footer.php"); ?>