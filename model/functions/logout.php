<?php

session_start();
require("../database/users_db.php");

update_user_id($_SESSION["unique_id"], "Offline now");
session_reset();
session_destroy();
