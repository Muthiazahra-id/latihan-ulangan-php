<?php
date_default_timezone_set('Asia/Jakarta');
if(!isset($SESSION))
{
      include('./header.php');
      session_start();
}

      $mysqli = new mysqli("localhost","root","","bebas");
      if ($mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
      }
?>