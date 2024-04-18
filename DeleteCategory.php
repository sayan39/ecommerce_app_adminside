<?php 
  include("mymethods.php");
 $category_id = $_GET['category_id'];

 $response = delete_cat($category_id);
 
 return $response;
?>
