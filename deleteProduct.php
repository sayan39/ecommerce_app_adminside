<?php 
  include("mymethods.php");
 $product_id = $_GET['product_id'];

 $response = delete_products($product_id);
 
 return $response;
?>
