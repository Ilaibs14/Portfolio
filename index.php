<?php 
$connection = mysqli_connect("localhost", "root", "", "ilai_portfolio");
session_start();
?>
<!DOCTYPE html>
<html dir="rtl" lang="he">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="customer web developer ilai ben shushan ilaibens 14 israel">
		<meta name="description" content="web developer coder ilai ben shushan">
		<title>Ilai Ben ShuShan</title>
		
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
  		<link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  		<link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
		
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	</head>
	
	<body>
		<!-- HEADER -->
		<div id="header" class="container-fluid">
			<div class="h-text">
				<h1>Ilai Ben ShuShan</h1>
				<p>Web Developer</p>
			</div>
	
			<nav class="navbar navbar-expand-sm navbar-static-top navbar-header navbar-dark navbar-default">
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navCollapse">
					 <span class="navbar-toggler-icon"></span>
				</button>
				
				<div class="collapse navbar-collapse" id="navCollapse">
					<ul class="navbar-nav">
						<li class="nav-item"><a class="nav-link" href="#">ראשי</a></li>
						<li class="nav-item"><a class="nav-link" href="#about">אודות</a></li>
						<li class="nav-item"><a class="nav-link" href="#portfolio">תיק עבודות</a></li>
						<li class="nav-item"><a class="nav-link" href="#newsletter">צור קשר</a></li>
					</ul>
				</div>
			</nav>
		</div>

		<!-- MAIN -->
		
		<!-- about -->
		<div id="about" class="container">
			<div class="a-header">
				<h1><span id="headline">אודות</span></h1>
			</div>
			
			<div class="container">
				<div class="row">
					<?php 
						$query = "SELECT * FROM about";
						$query_run = mysqli_query($connection, $query);
					?>
					<div class="col-16">
						<?php
						if(mysqli_num_rows($query_run) > 0) {
							while($row = mysqli_fetch_assoc($query_run)) {
						?>
						<p><?php echo $row['description']; ?></p>
						<?php } }?>
					</div>
				</div>
				
				<div class="col-16">
					<h5 style="text-align:left">HTML</h5>
					<div class="progress md-progress">
						<div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
					</div>
					<h5 style="text-align:left">CSS</h5>
					<div class="progress md-progress">
						<div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
					</div>
					<h5 style="text-align:left">JavaScript</h5>
					<div class="progress md-progress">
						<div class="progress-bar bg-warning" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" align="left">70%</div>
					</div>
					<h5 style="text-align:left">PHP</h5>
					<div class="progress md-progress">
						<div class="progress-bar bg-primary" role="progressbar" style="width: 90%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" align="left">90%</div>
					</div>
				</div>
			</div>
		</div>

		<!-- newsletter -->
		<div id="newsletter">
			<div class="container">
				<div class="news-chat-img">
					<img src="imgs/chat.png" alt="chat" height="150px" width="150px" style="padding: 0.8em" class="mx-auto d-block img-fluid"/>
				</div>
				<div class="row">
					<div class="col-16 mx-auto d-block news-texts">
						<h2>התרשמת? צרו קשר</h2>
						<h4>אנחנו מזמינים אותכם ליצור קשר, לכדי להתחיל לעבוד איתנו !</h4>
					</div>
				</div>
				<div class="news-form">
                    <?php
                    if(isset($_SESSION['success']) && $_SESSION['success'] !='') {
                        echo '<h2>'.$_SESSION['success'].'</h2>';
                        unset($_SESSION['success']);
                    }
                    ?>
					<form action="admin/code.php" method="post">
						<div class="form-row">
							<div class="form-group col-md-3">
								<input type="text" class="form-control" placeholder="שם מלא" name="name" required>
							</div>
							<div class="form-group col-md-3">
								<input type="text" class="form-control" placeholder="אימייל" name="email" required>
							</div>
							<div class="form-group col-md-3">
								<input type="text" class="form-control" placeholder="מספר טלפון" name="phone" required>
							</div>
							<div class="form-group col-md-3">
								<input type="text" class="form-control" placeholder="נושא" name="subject" required>
							</div>
						</div>
						<input type="submit" class="btn btn-outline-primary main-btn w-25" name="contact_me" value="שלח">
					</form>
				</div>
			</div>
		</div>
		
		<!-- portfolio -->
		<div id="portfolio">
			<div class="container">
				<div class="pf-header">
					<h1><span id="headline">תיק עבודות</span></h1>
				</div>
				<!-- Ilai Portfolio -->
				<div class="row portfolio-container">
                    <?php 
                        $query = "SELECT * FROM portfolio";
                        $query_run = mysqli_query($connection, $query);
					   if(mysqli_num_rows($query_run) > 0) {
						  while($row = mysqli_fetch_assoc($query_run)) { ?>
					<div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
						<div class="portfolio-wrap">
							<figure>
								<img src="admin/upload/<?php echo $row['image']; ?>" class="img-fluid" alt="<?php echo $row['title']; ?>">
								<a href="admin/upload/<?php echo $row['image']; ?>" data-lightbox="portfolio" data-title="<?php echo $row['title']; ?>" class="link-preview mr-2" title="Preview"><i class="ion ion-eye"></i></a>
							</figure>
							
							<div class="portfolio-info">
								<h4><?php echo $row['title']; ?></h4>
								<p><?php echo $row['description']; ?></p>
							</div>
						</div>
					</div>
                    <?php 
						}
                    }
				    ?>
                </div>
			</div>
		</div>
        
        <?php print phpinfo();  ?>
		
		<!-- footer -->
		<div class="footer page-footer font-small">
			<div class="footer-copyright text-center py-3">
				© 2020 Copyright: Ilai Ben ShuShan
			</div>
		<div>
		<!-- scripts -->
		<script src="lib/lightbox/js/lightbox.min.js"></script>
	</body>
	
</html>