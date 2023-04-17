<?php
include "database.php";
function get_messages()
{
    global $db;
    $query = "SELECT * FROM messages ORDER BY msg_id";
    $statement = $db->prepare($query);
    $statement->execute();
    $users = $statement->fetchAll();
    $statement->closeCursor();
    return $users;
}
