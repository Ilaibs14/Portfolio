
	<div class="sidebar" data-color="white" data-active-color="danger">
      			<div class="logo">
        			<a href="index.php" class="simple-text logo-normal">
          				Ilai Ben ShuShan
        			</a>
      			</div>
				<div class="sidebar-wrapper">
					<ul class="nav">
						<li>
							<a href="index.php">
						  		<i class="nc-icon nc-bank"></i>
						  		<p>Dashboard</p>
							</a>
					  	</li>
						<li>
							<a href="about.php">
								<i class="nc-icon nc-zoom-split"></i>
								<p>About</p>
							</a>
						</li>
						<li>
							<a href="portfolio.php">
								<i class="nc-icon nc-badge"></i>
								<p>Portfolio</p>
							</a>
						</li>
						<li>
							<a href="users.php">
								<i class="nc-icon nc-single-02"></i>
								<p>Users</p>
							</a>
						</li>
						<li>
							<a href="../index.php">
								<i class="nc-icon nc-minimal-right"></i>
								<p>Back to Website</p>
							</a>
						</li>
					</ul>
				</div>
    		</div>

    		<div class="main-panel">
      			<!-- Navbar -->
      			<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        			<div class="container-fluid">
          				<div class="navbar-wrapper">
            				<div class="navbar-toggle">
              					<button type="button" class="navbar-toggler">
                					<span class="navbar-toggler-bar bar1"></span>
                					<span class="navbar-toggler-bar bar2"></span>
                					<span class="navbar-toggler-bar bar3"></span>
              					</button>
            				</div>
            				<a class="navbar-brand" href="index.php">Ilai Ben ShuShan - Admin Panel</a>
          				</div>
        			</div>
					<a class="nav-link" href="#" id="userDropdown" role="button">
						<span class="mr-5 text-grey-600">
							<?php echo $_SESSION['username']; ?>
						</span>
					</a>
					<form action="logout.php" method="post"><button type="submit" name="logout_btn" class="btn btn-primary">Logout</button></form>
      			</nav>