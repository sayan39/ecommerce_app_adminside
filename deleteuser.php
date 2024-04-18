<?php 
  include("mymethods.php");
 $email = $_GET['email'];

 $response = delete_user($email);
 
 return $response;
?>
