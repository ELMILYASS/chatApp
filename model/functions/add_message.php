<?php
session_start();
if (isset($_SESSION["unique_id"])) {

    require("../database/messages_db.php");
    $message = $_POST["message"];
    $id_receiver = $_POST["id_receiver"];
    if ($message != "") {
        add_message($_SESSION["unique_id"], $id_receiver, $message);
        echo "success";
    } else {
        echo "Write a message !!!!";
    }
} else {
    echo "session finished";
}
