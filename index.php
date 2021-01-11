<?php include 'header.php'; ?>

<?php
$mysqli = new mysqli('127.0.0.1', 'root', '', 'testphp');
if ($mysqli->connect_error) {

  printf("can not connect databse %s\n", $mysqli->connect_error);
  exit();
}

if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $age = $_POST['age'];
  $text_user = $_POST['text_user'];
 
  $target_dir="uploads/";
	$target_file= $target_dir . basename($_FILES["images"]["name"]);
	$temp_file=$_FILES["images"]["name"];
	move_uploaded_file($_FILES["images"]["tmp_name"], $target_file);
  $query="INSERT INTO `User` (`id`, `name`, `age`, `text_user`, `images`) VALUES (null, '$name', '$age', '$text_user', '$temp_file')";    
  $insert=$mysqli->query($query);

}
?>

<form class="middle_form w-50">
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter Name">
  </div>

  <div class="form-group">
    <label>LastName</label>
    <input type="text" class="form-control" name="lastname" placeholder="Enter LastName">
  </div>

  <div class="form-group">
    <label>Tel</label>
    <input type="number" class="form-control" name="tel" placeholder="Enter Tel">
  </div>

   <div class="form-group">
    <label >address</label>
    <textarea class="form-control" name="address" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>