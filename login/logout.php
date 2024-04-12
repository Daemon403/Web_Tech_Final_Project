<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   unset($_SESSION["rid"]);
   echo 'SESSION TERMINATED';
   header('Refresh: 2; URL = ../login/login_view.php');
?>