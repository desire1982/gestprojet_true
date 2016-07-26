<?php
$mysqli = new mysqli("localhost", "daf_mie", "123456789", "gestprojet_true");
  if($mysqli->connect_errno){
    echo "Failed to connect to MySQL: ".$mysqli->connect_error;
  }
  ?>