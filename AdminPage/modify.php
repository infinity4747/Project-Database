<?php
	if(isset($_GET['update'])){
	  $total = count($_GET['book_id']);  
      $book_id_arr = $_GET['book_id']; 
      $image_arr = $_GET['image'];
      $price_arr = $_GET['price'];
      $quantity_arr = $_GET['quantity']; 
      for($i = 0; $i < $total; $i++){ 
         $book_id = $book_id_arr[$i]; 
         $image = $image_arr[$i];
         $price = $price_arr[$i];
         $quantity = $quantity_arr[$i];
         $sql = "UPDATE book SET image = '$image',price = '$price', quantity = '$quantity' WHERE book_id = '$book_id'";
         $conn = pg_connect("host=localhost dbname=project user=postgres password=1234")or die("Error");
         $query = pg_query($sql);
         header('Location: project.php');} 
	}
?>