<?php

$password = $_POST['new_pass'];
$username = $_POST['new_user'];

if (!isset($username) || $username == "" 
    || !isset($password) || $password == "")
{
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location: account_setup.php");
    die();
}

$username = htmlspecialchars($username);

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

require("heroku_access.php");
$db = get_db();
$query = 'INSERT INTO player(username, password) VALUES(:username, :password)';
$new_account = $db->prepare($query);
$new_account->bindValue(':username', $username);
$new_account->bindValue(':password', $hashedPassword);
$new_account->execute();

header("Location: login.php");
die();



?>