<?php include("header.php");
session_start();

if (!isset($_SESSION["unique_id"])) {
    header("Location:index.php");
}

require("model/database/users_db.php");
?>
<div class="container users">

    <div class="select">
        <div class="account">
            <?php
            update_user_id($_SESSION["unique_id"], "Active");
            $user = get_user_by_uniqueID($_SESSION["unique_id"]);

            ?>
            <img src="model/images/<?= $user["img"]; ?>" alt="">
            <div class="infos">
                <h2><?= $user["fname"] . " " . $user["lname"]; ?></h2>
                <p> <?= $user["status"]; ?></p>
            </div>
            <button>Logout</button>

        </div>

        <div class="select-user">
            <input type="text" placeholder="Search ...">
            <i class="fas fa-search"></i>

        </div>
       
    </div>



    <div class="people users_list ">

    </div>
    <div class="people users_list searching">

    </div>

</div>
<script src="Controller/users.js"></script>

<?php include("footer.php"); ?>