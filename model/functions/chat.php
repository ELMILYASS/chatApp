<?php

require("../database/messages_db.php");
require("../database/users_db.php");
session_start();

if (isset($_SESSION["unique_id"])) {
    $id = $_POST["id_receiver"];
    $user = get_user_by_uniqueID($id);
    $msgs = get_messages($_SESSION["unique_id"], $id);
    $msg = "";
    for ($i = 0; $i < count($msgs); $i++) {

        if ($msgs[$i]["id_sender"] == $id) {
            $msg .= '
            <div>
            <img src="model/images/' . $user["img"] . '" alt="img">
            <p>' . $msgs[$i]["msg"] . '</p>
            </div>
            
            ';
        } else {

            $msg .= '
        <div>
        <p>' . $msgs[$i]["msg"] . '</p> 
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
