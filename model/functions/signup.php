<?php

session_start();
require("../database/users_db.php");
$email = $_POST["email"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$password = $_POST["password"];
$image = $_FILES["image"];

if ($email && $fname && $lname && $password) {


    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if (email_exists($email)) {
            echo "$email - This email already exist!";
        } else {

            if (isset($image)) {    //verify if we have entered an email
                $img_name = $_FILES['image']['name'];
                $img_type = $_FILES['image']['type'];
                $tmp_name = $_FILES['image']['tmp_name'];
                $explode_img = explode('.', $img_name);
                $img_extension = end($explode_img);
                $extensions = ["jpeg", "png", "jpg"];

                if (in_array($img_extension, $extensions)) {  //verify the extension


                    $types = ["image/jpeg", "image/jpg", "image/png"];
                    if (in_array($img_type, $types)) {   //verify the type of the file
                        $time = time();
                        $random_id = rand(time(), 100000000);
                        $status = "Active";
                        $encrypt_pass = md5($password);
                        $new_img_name = $time . $img_name;
                        if (move_uploaded_file($tmp_name, "../images/" . $new_img_name)) {
                            add_new_user($random_id, $fname, $lname, $email, $encrypt_pass, $new_img_name, $status);

                            $_SESSION["unique_id"] = $random_id;
                            echo "success";
                        }
                    } else {
                        echo "Please upload an image file - jpeg, png, jpg";
                    }
                } else {

                    echo "Please upload an image file - jpeg, png, jpg";
                }
            }
        }
    } else {
        echo "$email is not a valid email!";
    }
} else {

    echo "All input fields are required ";
}



