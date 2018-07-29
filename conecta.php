<?php
   $db_host = "127.0.0.1";
   $db_login = "root";
   $db_password = "";
   $db_db = "twitter";
   $conn = new mysqli($db_host, $db_login, $db_password, $db_db);
   if ($conn->connect_error) die($conn->connect_error);
?>
