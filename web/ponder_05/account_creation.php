<?php

$password = $_POST['new_pass'];
$user = $_POST['new_user'];

if (!isset($user) || $user = "" || !isset($password) || $password = "")
{
    header("Location: account_setup.php");
    die();
}


$user = htmlspecialchars($user);

$hashed = password_hash($password, PASSWORD_DEFAULT);

require('heroku_access.php');
$db = get_db();

$new_account = $db->prepare('INSERT INTO player (username, password) VALUES (:username, :hashed)');
$new_account->bindValue(':username', $username);
$new_account->bindValue(':hashed', $hashed);
$new_account->execute();

header("Location: login.html");
die();



?>