<?php
session_start();
require("heroku_access.php");
$db = get_db();

$fname = $_POST['new_fname'];
$lname = $_POST['new_lname'];
$title = $_POST['new_title'];
$location = $_POST['new_location'];
$email = $_POST['new_email'];
$bio = $_POST['new_bio'];
$phone = $_POST['new_phone'];

if (isset($fname) && $fname != "")
{
    $fname = htmlspecialchars($fname);
    $query = 'INSERT INTO profile(fname) VALUES(:fname)';
    $new = $db->prepare($query);
    $new->bindValue(':fname', $fname);
    $new->execute();
}

if (isset($lname) && $lname != "")
{
    $lname = htmlspecialchars($lname);
    $query = 'INSERT INTO profile(lname) VALUES(:lname)';
    $new = $db->prepare($query);
    $new->bindValue(':lname', $lname);
    $new->execute();
}

if (isset($title) && $title != "")
{
    $title = htmlspecialchars($title);
    $query = 'INSERT INTO profile(title) VALUES(:title)';
    $new = $db->prepare($query);
    $new->bindValue(':title', $title);
    $new->execute();
}

if (isset($location) && $location != "")
{
    $location = htmlspecialchars($location);
    $query = 'INSERT INTO profile(location) VALUES(:location)';
    $new = $db->prepare($query);
    $new->bindValue(':location', $location);
    $new->execute();
}

if (isset($email) && $email != "")
{
    $email = htmlspecialchars($email);
    $query = 'INSERT INTO profile(email) VALUES(:email)';
    $new = $db->prepare($query);
    $new->bindValue(':email', $email);
    $new->execute();
}

if (isset($bio) && $bio != "")
{
    $bio = htmlspecialchars($bio);
    $query = 'INSERT INTO profile(bio) VALUES(:bio)';
    $new = $db->prepare($query);
    $new->bindValue(':bio', $bio);
    $new->execute();
}

if (isset($phone) && $phone != "")
{
    $phone = htmlspecialchars($phone);
    $query = 'INSERT INTO profile(phone) VALUES(:phone)';
    $new = $db->prepare($query);
    $new->bindValue(':phone', $phone);
    $new->execute();
}


?>