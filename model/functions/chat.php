<?php

session_start();
require("../database/messages_db.php");
require("../database/users_db.php");


if (isset($_SESSION["unique_id"])) {
    $id = $_POST["id_receiver"];
    $user = get_user_by_uniqueID($id);
    $msgs = get_messages($_SESSION["unique_id"], $id);
    $msg = "";
    for ($i = 0; $i < count($msgs); $i++) {

        if ($msgs[$i]["id_sender"] == $id) {
            $msg .= '
            <div class="message received">
           
           ' . $msgs[$i]["msg"] . '
            </div>
            
            ';
        } else {

            $msg .= '
        <div class="message sent">
       ' . $msgs[$i]["msg"] . ' 
        </div>
        ';
        }
    }

    if ($msg == "") {
        echo "You don't have message with " . $user["fname"] . " " . $user["lname"];
    } else {
        echo $msg;
    }
} else {
    echo "session finished";
}
