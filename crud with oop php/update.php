<?php 
 include 'header.php';
 include 'config.php';
 include 'Database.php';
 ?>

<?php 
$id= $_GET['id'];
$db = new Database();
$query="SELECT * FROM crudapp WHERE id=$id";
$getData= $db->select($query)->fetch_assoc();



if(isset($_POST['submit']))
{
	$name = mysqli_real_escape_string($db->link,$_POST['name']);

	$email = mysqli_real_escape_string($db->link,$_POST['email']);

	$skill = mysqli_real_escape_string($db->link,$_POST['skill']);

	if($name =='' || $email =='' || $skill =='')
	{
		$error="Field Must Not Be Empty !!";
	}
	else
	{
		$query="UPDATE crudapp
		SET
		name='$name',
		email='$email',
		skill='$skill'
		WHERE id = $id";


		$update = $db->update($query);

		$msg = "Data updated successfully";
	}
}

?>


<?php 
if(isset($error)){
	echo"<div class='alert alert-danger col-md-4 align-center mt-2'>".$error."</div>";
}


if(isset($msg)){
	echo"<div class='alert alert-success col-md-4 align-center mt-2'>".$msg."</div>";
}

?>

<div class="card-body">

<form action="update.php?id=<?php echo $id; ?>" method="post">

	<div class="form-group">
		<label for="name">Name:</label>
   <input type="text" class=" form-control col-md-4" name="name" value="<?php echo $getData['name'] ?>" />

   	</div>

   	<div class="form-group">
		<label for="email">Email:</label>
  <input type="text" class="form-control col-md-4" name="email" value="<?php echo $getData['email'] ?>" />

   	</div>

   	<div class="form-group">
		<label for="skill">Skill:</label>
  <input type="text" class=" form-control col-md-4" name="skill" value="<?php echo $getData['skill'] ?>" />

   	</div>

      <input type="submit" class="btn btn-info" name="submit" value="Update"/>

      <input type="reset" class="btn btn-warning" value="Cancel"/>



</form>

</div>

<a href="index.php" class="btn btn-success col-sm-1" style="font-weight: bold; margin-bottom: 10px">Go Back </a>

<?php include 'footer.php'; ?>