<?php 
 include 'header.php';
 include 'config.php';
 include 'Database.php';
 ?>


<?php 
// code for fetch data from db
$db=new Database();
$query="SELECT * FROM crudapp";
$read= $db->select($query);


if(isset($_GET['delinfo'])){
	// code for delete item  
   $id = $_GET['delinfo'];
   $query="DELETE FROM crudapp WHERE id=$id";
   $deleteData=$db->delete($query);
   $msg = "Data deleted successfully";
    
}

?>


<div class="card-body">

<?php 

	if(isset($msg)){
	echo"<div class='alert alert-success col-md-4 align-center mt-2'>".$msg."</div>";
    }
?>

<a href="create.php" class="btn btn-success" style="font-weight: bold; float: left; margin-bottom: 10px;">Create</a>


	<table class="table table-bordered table-hover">

		<thead>

			<th>#</th>
			<th>Name</th>
			<th>Email</th>
			<th>Skill</th>
			<th>Action</th>

		</thead>

		<tbody>

			<?php if($read) { ?>

				<tr>

					<?php 

					$i = 1; 

					while($row = $read->fetch_assoc()){ ?>

						<td><?php echo $i++; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['skill'];?></td>
						<td>
							<a href="update.php?id=<?php echo urlencode( $row ['id']); ?>" class="btn btn-warning">Edit</a>

							<a href="?delinfo=<?php echo $row ['id']; ?>" class="btn btn-danger">Delete</a>

						</td>

				</tr>

			<!-- end of php while loop -->

			<?php } ?>

			<!-- end of if condition -->
			<?php } else { ?>

				<p>No data available</p>

			<?php } ?>
			
			<tr>
				


			</tr>


		</tbody>
		

	</table>
	

</div>

<?php include 'footer.php'; ?>