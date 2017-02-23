<?php

/***********************************************************
 * PHP document that creates a new user in the database,
 * generates a new row for the profile data as well as a 
 * new row of conversation.
 **********************************************************/



$password = $_POST['new_pass'];
$username = $_POST['new_user'];

if (!isset($username) || $username == "" 
    || !isset($password) || $password == "")
{
    header("Location: account_setup.php");
    die();
}

$username = htmlspecialchars($username);

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Creates a new user in the player table
require("heroku_access.php");
$db = get_db();
$query = 'INSERT INTO player(username, password) VALUES(:username, :password)';
$new_account = $db->prepare($query);
$new_account->bindValue(':username', $username);
$new_account->bindValue(':password', $hashedPassword);
$new_account->execute();

// Retrieves newly created id for a user so it can be used for the other tables
try{
$query = 'SELECT id FROM player WHERE username = :username';
$push_id = $db->prepare($query);
$push_id->bindValue(':username', $username);
$push_id->execute();
$row = $push_id->fetch(PDO::FETCH_ASSOC);
$push_id->closeCursor();
}
catch (Exception $ex)
{
    echo "ERROR: Could not receive id from database (This is found at line 30). Details: $ex";
    die();
}

// Assigns the id recently created to a local variable and sessionn variable
try {
$id = $row['id'];
$_SESSION['id'] = $id;
}
catch (Exception $ex)
{
    echo "ERROR: Could not assign 'id' to session variable. Details: $ex";
    die();
}

// Creates a new profile row to store users profile information
try {
$query = 'INSERT INTO profile(player_id) VALUES(:id)';
$profile_id = $db->prepare($query);
$profile_id->bindValue(':id', $id);
$profile_id->execute();
}
catch (Exception $ex)
{
    echo "ERROR: Could not create new id in profile table. Details: $ex";
    die();
}

// Creates a new conversation row to store a conversation
try {
$query = 'INSERT INTO conversation(player_id) VALUES(:id)';
$profile_id = $db->prepare($query);
$profile_id->bindValue(':id', $id);
$profile_id->execute();
}
catch (Exception $ex)
{
    echo "ERROR: Could not create new id in conversation table. Details: $ex";
    die();
}



header("Location: login.php");
die();



?>