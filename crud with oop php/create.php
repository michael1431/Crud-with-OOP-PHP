<?php 
 include 'header.php';
 include 'config.php';
 include 'Database.php';
 ?>

<?php 
$db = new Database();
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
		$query="INSERT INTO crudapp(name,email,skill)VALUES ('$name','$email','$skill')";
		$create = $db->insert($query);
		//header ("Location:index.php");
		$success = "Data inserted successfully!!";
	}
}
?>

<?php 

if(isset($error)){
	echo"<div class='alert alert-danger col-md-4 align-center mt-2'>".$error."</div>";
}

if(isset($success)){
	echo"<div class='alert alert-success col-md-4 align-center mt-2'>".$success."</div>";
}
?>

<div class="card-body">

<form action="create.php" method="post">

	<div class="form-group">
		<label for="name">Name:</label>
   <input type="text" class=" form-control col-md-4" name="name" placeholder="Enter Your Name" />

   	</div>

   	<div class="form-group">
		<label for="email">Email:</label>
  <input type="text" class="form-control col-md-4" name="email" placeholder="Enter Your Email" />

   	</div>

   	<div class="form-group">
		<label for="skill">Skill:</label>
  <input type="text" class=" form-control col-md-4" name="skill" placeholder="Enter Your SKill" />

   	</div>

<input type="submit" class="btn btn-success" name="submit" value="submit"/>
<input type="reset" class="btn btn-info" value="cancel"/>



</form>

</div>

<a href="index.php" class="btn btn-warning col-sm-1" style="font-weight: bold; margin-bottom: 10px;">Go Back </a>


<?php include 'footer.php'; ?>