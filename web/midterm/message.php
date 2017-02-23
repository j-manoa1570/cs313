<?php
session_start();
require("heroku_access.php");
$db = get_db();

$message = $_POST['instant_message'];
$id = $_SESSION['id'];

// Updates the dcon column in the database

if (isset($message) && $message != "")
    {
        $query = 'UPDATE conversation SET dcon= :dcon WHERE player_id = :id';
        $new = $db->prepare($query);
        $new->bindValue(':dcon', $message);
        $new->bindValue(':id', $id);
        $new->execute();
    }

header("Location: machine.php");
die();

?>