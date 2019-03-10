<?php 
require "libraries/models/UsersModel.php";
require "HTTP/Http.php";
require "SESSIONS/Session.php";
session_start();

if (empty($_POST['email']) || empty($_POST['password'])) {
    Session::addError("You need to fill in all the fields !");
    Http::redirectBack();
}

$usersTable = new Users();
$user = $usersTable->find($_POST['email'], 'email');

$logged = password_verify($_POST['password'], $user['password']);

if ($logged) {
    Session::connect($user);
}

Http::redirect("home");

?>