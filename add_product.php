<?php
require_once("./entities/product.class.php");

if(isset($_POST["btnsubmit"])){
  $productName = $_POST["txtName"];
  $cateID = $_POST["CateID"];
  $price = $_POST["txtprice"];
  $quantity = $_POST["txtquantity"];
  $description = $_POST["txtdesc"];
  $picture = $_POST["txtpic"];
  //Tạo Đối Tượng product
  $newProduct = new Product($productName, $cateID, $price, $quantity, $description, $picture);
  //Lưu Xuống CSDL
  $result = $newProduct->save();
  if(!$result){
    //Truy vấn Lỗi
    header("Location: add_product.php?failure ");
  }else{
    header("Location: add_product.php?inserted");
  }
}
 ?>
 <?php include_once("header.php"); ?>
 <?php
 //lấy giá trị tham số
 if(isset($_GET["inserted"])){
   echo "<h2>Thêm sản phẩm thành công</h2>";
 } ?>
 <div class="container">
 <!--thông tin sản phẩm-->
 <form method="post">
   <!--Tên SP-->
   <div class="row">
     <div class="lbltitle">
       <label>Tên sản phẩm</label>
     </div>
     <div class="lblinput">
       <input type="text" name="txtName" value="<?php echo isset($_POST["txtName"]) ? $_POST["txtName"] : "" ; ?>"/>
     </div>
   </div>
   <!--Mô tả SP-->
   <div class="row">
     <div class="lbltitle">
       <label>Mô tả sản phẩm</label>
     </div>
     <div class="lblinput">
       <textarea name="txtdesc" cols="21" rows="10" value="<?php echo isset($_POST["txtdesc"]) ? $_POST["txtdesc"] : "" ; ?>"></textarea>
     </div>
   </div>
   <!--Số lượng SP-->
   <div class="row">
     <div class="lbltitle">
       <label>Số lượng sản phẩm</label>
     </div>
     <div class="lblinput">
       <input type="text" name="txtquantity" value="<?php echo isset($_POST["txtquantity"]) ? $_POST["txtquantity"] : "" ; ?>"/>
     </div>
   </div>
   <!--Giá Bán SP-->
   <div class="row">
     <div class="lbltitle">
       <label>Giá sản phẩm</label>
     </div>
     <div class="lblinput">
       <input type="text" name="txtprice" value="<?php echo isset($_POST["txtprice"]) ? $_POST["txtprice"] : "" ; ?>"/>
     </div>
   </div>
   <!--loại SP-->
   <div class="row">
     <div class="lbltitle">
       <label>Loại sản phẩm</label>
     </div>
     <div class="lblinput">
       <select id="CateID" name="CateID">
         <option value="" selected>--Chọn loại sản phẩm--</option>
       <?php
          $conn = new mysqli('localhost', 'root', '','ecommerce');
          $result = $conn->query("select CateID, CategotyName from category");

          while ($rs = mysqli_fetch_array($result)) {
               $select.='<option value="'.$rs['CateID'].'">'.$rs['CategotyName'].'</option>';
           }
           $select.='</select>';
           echo $select;
        ?>
     </div>
   </div>
   <!--Hình ảnh Minh Họa SP-->
   <div class="row">
     <div class="lbltitle">
       <label>Đường dẫn hình ảnh</label>
     </div>
     <div class="lblinput">
       <input type="file" name="txtpic" acept=".PNG,.GIF,.JPG"/>
     </div>
   </div>
   <!--iNút Thêm SP-->
   <div class="row">
     <div class="submit">
       <input type="submit" name="btnsubmit" value="Thêm sản phẩm">
     </div>
   </div>
 </form>
</div>
 <?php include_once("footer.php") ?>
