<?php
include "database.php";
function get_messages($id_sender, $id_receiver)
{
    global $db;
    $query = "SELECT * FROM messages  where  id_sender=:id_s AND id_receiver=:id_r OR id_sender=:id_ss and id_receiver=:id_rr ORDER BY msg_id";
    $statement = $db->prepare($query);
    $statement->bindValue(":id_s", $id_sender);
    $statement->bindValue(":id_r", $id_receiver);
    $statement->bindValue(":id_ss", $id_receiver);
    $statement->bindValue(":id_rr", $id_sender);
    $statement->execute();
    $msgs = $statement->fetchAll();
    $statement->closeCursor();
    return $msgs;
}


function add_message($id_sender, $id_receiver, $msg)
{
    global $db;
    $query = "INSERT INTO messages (id_sender,id_receiver,msg) VALUES (:id_s,:id_r,:msg)";

    $statement = $db->prepare($query);
    $statement->bindValue(":msg", $msg);

    $statement->bindValue(":id_s", $id_sender);
    $statement->bindValue(":id_r", $id_receiver);
    $statement->execute();
    $statement->closeCursor();
}


function get_last_message($id_sender, $id_receiver)
{
    global $db;
    $query = "SELECT * FROM messages  where  id_sender=:id_s AND id_receiver=:id_r OR id_sender=:id_ss and id_receiver=:id_rr ORDER BY msg_id";
    $statement = $db->prepare($query);
    $statement->bindValue(":id_s", $id_sender);
    $statement->bindValue(":id_r", $id_receiver);
    $statement->bindValue(":id_ss", $id_receiver);
    $statement->bindValue(":id_rr", $id_sender);
    $statement->execute();
    $msgs = $statement->fetchAll();
    if (count($msgs) == 0) {
        $msg = "";
    } else {
        $msg = current($msgs);
    }
    $statement->closeCursor();
    return $msg;
}
