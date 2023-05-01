<?php
include("database.php");


function email_exists($email)
{
    global $db;
    $query = "SELECT * FROM users WHERE email=:email";
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->execute();
    $user = $statement->fetch();
    return $user;
}


function add_new_user($id, $fname, $lname, $email, $password, $img, $status)
{

    global $db;
    $query = 'INSERT INTO users(unique_id,fname,lname,email,password,img,status) VALUES (:id,:fname,:lname,:email,:password,:img,:status)';
    $statement = $db->prepare($query);

    $statement->bindValue(":id", $id);
    $statement->bindValue(":fname", $fname);
    $statement->bindValue(":lname", $lname);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":password", $password);
    $statement->bindValue(":img", $img);
    $statement->bindValue(":status", $status);
    $statement->execute();
    $statement->closeCursor();
}

function get_user_by_email($email)
{
    global $db;
    $query = 'SELECT * FROM users WHERE email=:email';
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    return $result;
}


function update_user_($email, $status)
{
    global $db;
    $query = 'UPDATE users SET status=:status WHERE email=:email';
    $statement = $db->prepare($query);
    $statement->bindValue(":status", $status);
    $statement->bindValue(":email", $email);
    $statement->execute();
    $statement->closeCursor();
}

function update_user_id($unique_id, $status)
{
    global $db;
    $query = 'UPDATE users SET status=:status WHERE unique_id=:id';
    $statement = $db->prepare($query);
    $statement->bindValue(":status", $status);
    $statement->bindValue(":id", $unique_id);
    $statement->execute();
    $statement->closeCursor();
}

function get_user_by_uniqueID($unique_id)
{
    global $db;
    $query = "SELECT * FROM users WHERE unique_id=:id";
    $statement = $db->prepare($query);
    $statement->bindValue(":id", $unique_id);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
}


function get_users()
{
    global $db;
    $query = 'SELECT * FROM users ORDER BY user_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $users = $statement->fetchAll();
    $statement->closeCursor();
    return $users;
}

function get_users_without_one($id)
{
    global $db;
    $query = 'SELECT * FROM users WHERE unique_id NOT IN (:id) ORDER BY user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":id", $id);
    $statement->execute();
    $users = $statement->fetchAll();
    $statement->closeCursor();
    return $users;
}
