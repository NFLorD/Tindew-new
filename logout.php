<?php 

require "HTTP/Http.php";
require "SESSIONS/Session.php";

Session::disconnect();
Http::redirect("index.php");


?>