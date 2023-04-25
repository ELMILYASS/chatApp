<?php

session_start();
require("../database/users_db.php");

$users = get_users_without_one($_SESSION["unique_id"]);

header('Content-type: application/json');
echo json_encode($users);
