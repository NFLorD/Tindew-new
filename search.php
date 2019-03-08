<?php 
require "CRUD/Users.php";
require "HTTP/Http.php";
require "SESSIONS/Session.php";

if (empty($_POST['searchValue'])) {
    Http::redirect("index.php");
}

$seek = filter_input(INPUT_POST, "searchValue", FILTER_SANITIZE_SPECIAL_CHARS);
$table = new Users();
$found = $table->findLike($seek, ['firstName', 'lastName']);

$title = "Résultats";
$template = "search";
require "templates/template.phtml";
?>