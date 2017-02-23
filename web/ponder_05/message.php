<?php
session_start();
require("heroku_access.php");
$db = get_db();

$message = $_POST['message'];
$id = $_SESSION['id'];

if (isset($message) && $message != "")
    {
        $query = 'UPDATE conversation SET dco= :dcon WHERE player_id = :id';
        $new = $db->prepare($query);
        $new->bindValue(':dcon', $message);
        $new->bindValue(':id', $id);
        $new->execute();
    }

header("Location: machine.php");
die();

?>