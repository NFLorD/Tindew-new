<?php 
require "libraries/models/Comments.php";
require "libraries/models/Users.php";

$statusid = filter_input(INPUT_GET, 'statusid', FILTER_VALIDATE_INT);
if (!is_int($statusid)) {
    echo "Wrong value";
    exit;
}

$comT = new Comments();
$coms = $comT->find($statusid, "status_id", true);

$usersT = new Users();
foreach ($coms as $index => $com) {
    $coms[$index]['user_id'] = $usersT->find($com["user_id"]);
}

$coms = json_encode($coms);

echo $coms;
?>