<?php 

session_start();
require "HTTP/Http.php";
require "SESSIONS/Session.php";

Session::disconnect();
Http::redirect("home");


?>