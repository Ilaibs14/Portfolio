<?php 
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="content">
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registery</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">
							<?php 
								$query = "SELECT count(*) as total from users";
								$result = mysqli_query($connection, $query);
								$data = mysqli_fetch_assoc($result);
								echo $data['total'];
							?>	
						</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-calender fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>