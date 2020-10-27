<?php 
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="content">
	<div class="logo">
		<h3>Edit Description:</h3>
	</div>
	
	<?php 
		if(isset($_POST['edit_btn'])){
			$id = $_POST['edit_id'];
			
			$query = "SELECT * FROM about WHERE id='$id'";
			$query_run = mysqli_query($connection, $query);
			
			foreach($query_run as $row) {
				?>
	
				<form action="code.php" method="post">
					<div class="modal-body">
						<input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
						<div class="form-group">
							<label> Description: </label>
							<input type="text" name="edit_description" value="<?php echo $row['description']; ?>" class="form-control">
						</div>
					</div>
					
					<div class="modal-footer">
						<a href="about.php" class="btn btn-danger">Cancel</a>
						<button type="submit" class="btn btn-primary" name="update_btn">Update</button>
					</div>
				</form>
	<?php
			}
		}
	?>
</div>

<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>