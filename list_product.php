<?php
	require_once("Entities/product.class.php");

 ?>
 <?php
 include_once("header.php");
 $pros=Product::list_product();
foreach ($pros as $pros) {

	echo "<p>Tên sản phẩm : ".$pros["ProductName"]."</p>";
	echo "<p>Giá: ".$pros["Price"]."</p>";
	echo "<p>Số Lượng: ".$pros["Quantity"]."</p>";
	echo "<p>Mô Tả: ".$pros["Description"]."</p>";
	echo '<img src="./images/'.$pros["picture"].'" style="width:200px;height:200px"/>';

}

 include_once("footer.php");
  ?>
