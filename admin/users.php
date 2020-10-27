<?php 
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="content">
	<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLable" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLable">Add Admin User:</h5>
					<button type="button" class="close" data-dismiss="modal" aria-lable="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="code.php" method="post">
					<div class="modal-body">
						<div class="form-group">
							<label> Username </label>
							<input type="text" name="username" class="form-control" placeholder="Enter Username">
						</div>
						<div class="form-group">
							<label> Email </label>
							<input type="email" name="email" class="form-control" placeholder="Enter Email">						
						</div>
						<div class="form-group">
							<label> Password </label>
							<input type="password" name="password" class="form-control" placeholder="Enter Password">						
						</div>
						<div class="form-group">
							<label> Confirm Password </label>
							<input type="password" name="confirmpassword" class="form-control" placeholder="Enter Confirm Password ">		
						</div>
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" name="registerbtn">Save</button>
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
	
	<?php
		$query = "SELECT * FROM users";
		$query_run = mysqli_query($connection, $query);
	?>
	<div class="card">
		<div class="card-body">
			<div class="table">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Username</th>
							<th scope="col">Email</th>
							<th scope="col">Password</th>
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
						<td><?php echo $row['username']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['password']; ?></td>
						<td>
							<form action="users_edit.php" method="post">
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
						}
						else{
							echo "No Record Found!";
						}
					?>
					</tbody>
				</table>		
			</div>
			<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#adduser">Add User</button>
		</div>
	</div>
</div>


<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>