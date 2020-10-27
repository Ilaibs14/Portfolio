<?php 
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="content">
	<div class="modal fade" id="changeWebsite" tabindex="-1" role="dialog" aria-labelledby="exampleModalLable" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLable">Add Project</h5>
					<button type="button" class="close" data-dismiss="modal" aria-lable="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="code.php" method="post" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group">
							<label> Website Title: </label>
							<input type="text" name="wTitle" class="form-control" placeholder="Enter Title">
						</div>
                        <div class="form-group">
                            <lable> Website Description: </lable>
                            <input type="text" name="wDescription" class="form-control" placeholder="Enter Description">
                        </div>
                        <div class="form-group">
                            <label> Website Link </label>
                            <input type="text" name="wLink" class="form-control" placeholder="Enter Website Link">
                        </div>
                        <div class="form-group">
                            <label> Upload Website Image </label>
                            <br>
                            <div class="file btn btn-lg btn-primary">
                                <input type="file" id="wImage" name="wImage" class="form-control">Upload Image
                            </div>
                        </div>
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" name="project_save">Save</button>
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
				<table class="table">
                    <?php 
                        $query = "SELECT * FROM portfolio";
                        $query_run = mysqli_query($connection, $query);
                    ?>
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Link</th>
                            <th scope="col">Image</th>
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
						<td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['link']; ?></td>
                        <td><?php echo '<img src="upload/'.$row['image'].'" width="100px" height="100px" alt="'.$row['title'].'" />'; ?></td>
						<td>
							<form action="portfolio_edit.php" method="post">
								<input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
								<button class="btn btn-succes" name="edit_btn" type="submit">Edit</button>
							</form>
						</td>
						<td>
							<form action="code.php" method="post">
								<input type="hidden" name="wdelete_id" value="<?php echo $row['id']; ?>">
								<button class="btn btn-danger" name="delete_image" type="submit">Delete</button>
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
			<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#changeWebsite">Add Project</button>
		</div>
	</div>

</div>


<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>