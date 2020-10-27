<?php 
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="content">
	<div class="modal fade" id="changeaboutxt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLable" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLable">Add Descriprion</h5>
					<button type="button" class="close" data-dismiss="modal" aria-lable="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="code.php" method="post">
					<div class="modal-body">
						<div class="form-group">
							<label> Description: </label>
							<input type="text" name="description" class="form-control" placeholder="Enter Description">
						</div>
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" name="about_save">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php 
	
	if(isset($_SESSION['success']) && $_SESSION['success'] !='') {
		echo '<h2>'.$_SESSION['success'].'</h2>';
		unset($_SESSION['success']);
	}
	
	if(isset($_SESSION['status']) && $_SESSION['status'] !='') {
		echo '<h2>'.$_SESSION['status'].'</h2>';
		unset($_SESSION['status']);
	}	
	?>
	<div class="card">
		<div class="card-body">
			<div class="table">
				<?php
					$query = "SELECT * FROM about";
					$query_run = mysqli_query($connection, $query);
				?>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Description</th>
							<th scope="col">Edit</th>
							<th scope="col">Delete</th>
						</tr>
					</thead>
					<tbody>
					<?php
					if(mysqli_num_rows($query_run) > 0) {
						while($row = mysqli_fetch_assoc($query_run)) {
					?>
					<tr>
						<th scope="row"><?php echo $row['id']; ?></th>
						<td><?php echo $row['description']; ?></td>
						<td>
							<form action="about_edit.php" method="post">
								<input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
								<button class="btn btn-succes" name="edit_btn" type="submit">Edit</button>
							</form>
						</td>
						<td>
							<form action="code.php" method="post">
								<input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
								<button class="btn btn-danger" name="delete_btn" type="submit">Delete</button>
							</form>
						</td>
					</tr>
					<?php 
						}
					} else {
						echo "No Record Found !";
					}
					?>
					</tbody>
				</table>		
			</div>
			<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#changeaboutxt">Add Description</button>
		</div>
	</div>

</div>


<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>