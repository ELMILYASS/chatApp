<?php
session_start();
require("../database/users_db.php");



$email = @$_POST["email"];

$password = @$_POST["password"];

if ($email && $password) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $user = get_user_by_email($email);

        if ($user) {
            $pass = md5($password);
            if ($user["password"] == $pass) {
                $status = "Active";
                $_SESSION["unique_id"] = $user["unique_id"];
                update_user_($user["email"], $status);
                echo "success";
            } else {
                echo "Password isn't correct ";
            }
        } else {
            echo "No account with this email ".$email;
        }
    } else {

        echo "$email is not a valid email!";
    }
} else {
    echo "All input fields are required!";
}
