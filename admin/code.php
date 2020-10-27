<?php
include('security.php');
$connection = mysqli_connect("localhost", "root", "", "ilai_portfolio");

/* =======================
	Register User
========================================= */
if(isset($_POST['registerbtn'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['confirmpassword'];
	
	if($password == $cpassword) {
		$query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
		$query_run = mysqli_query($connection, $query);

		if($query_run) {
			$_SESSION['success'] = "User Admin Added";
			header("location: users.php");

		} else {
			$_SESSION['status'] = "User Admin Not Added";
			header("location: users.php");
		}		
	} else {
		$_SESSION['status'] = "Confirm Password Incorrect !";
		header("location: users.php");		
	}
}

/* =============================
		Update User
==================================== */

if(isset($_POST['updatebtn'])) {
	$id = $_POST['edit_id'];
	$username = $_POST['edit_username'];
	$email = $_POST['edit_email'];
	$password = $_POST['edit_password'];
	
	$query = "UPDATE users SET username='$username', email='$email', password='$password' WHERE id='$id'";
	$query_run = mysqli_query($connection, $query);
	
	if($query_run) {
		$_SESSION['success'] = "Account Updated";
		header("location: users.php");
	} else {
		$_SESSION['status'] = "Account Not Updated";
		header("location: users.php");
	}
}

/* =====================================
			Delete User 
================================================ */

if(isset($_POST['delete_btn'])) {
	$id = $_POST['delete_id'];
	
	$query = "DELETE FROM users WHERE id='$id'";
	$query_run = mysqli_query($connection, $query);
	
	if($query_run) {
		$_SESSION['success'] = "Account Deleted !";
		header("location: users.php");
	} else {
		$_SESSION['status'] = "Account Dont Deleted !";
		header("location: users.php");	
	}
}

/* ==========================================
			Login 
========================================================= */

if(isset($_POST['login_btn'])) {
	$username_login = $_POST['username'];
	$password_login = $_POST['password'];
		
	$query = "SELECT * FROM users WHERE username='$username_login' AND password='$password_login'";
	$query_run = mysqli_query($connection, $query);

	if(mysqli_fetch_array($query_run)) {
		$_SESSION['username'] = $username_login;
		header("Location: index.php");
	} else {
		$_SESSION['status'] = "Email / Password Incorrect!";
		header("Location: login.php");
	}
}

/* ============================================
			About Description
================================================== */
if(isset($_POST['about_save'])) {
	$description = $_POST['description'];
	
	$query = "INSERT INTO about (description) VALUES  ('$description')";
	$query_run = mysqli_query($connection, $query);
	
	if($query_run) {
		$_SESSION['success'] = "Description Added !";
		header("Location: about.php");
	} else {
		$_SESSION['success'] = "Description Added !";
		header("Location: about.php");
	}
}

if(isset($_POST['update_btn'])) {
	$id = $_POST['edit_id'];
	$description = $_POST['edit_description'];
	
	$query = "UPDATE about SET description='$description' WHERE id='$id'";
	$query_run = mysqli_query($connection, $query);
	
	if($query_run) {
		$_SESSION['success'] = "Description Updated";
		header("location: about.php");
	} else {
		$_SESSION['status'] = "Description Not Updated";
		header("location: about.php");
	}
}

if(isset($_POST['delete_btn'])) {
	$id = $_POST['delete_id'];
	
	$query = "DELETE FROM about WHERE id='$id'";
	$query_run = mysqli_query($connection, $query);
	
	if($query_run) {
		$_SESSION['success'] = "Description Deleted !";
		header("location: about.php");
	} else {
		$_SESSION['status'] = "Description Dont Deleted !";
		header("location: about.php");	
	}
}


/* ==========================================
                Project Image
======================================================= */
if(isset($_POST['project_save'])) {
    $title = $_POST['wTitle'];
    $description = $_POST['wDescription'];
    $link = $_POST['wLink'];
    $image = $_FILES['wImage']['name'];
    $target = "../../admin/img/";
    
    $query = "INSERT INTO portfolio (title, description, link, image) VALUES ('$title', '$description', '$link', '$image')";
    $query_run = mysqli_query($connection, $query);
    
    $result = move_uploaded_file($_FILES['wImage']['tmp_name'], $target . $_FILES['׳wImage']['name']);
    
    if($result) {
        $_SESSION['success'] = "Image Not Upload !";
        header("Location: portfolio.php");
    } else {
        $_SESSION['success'] = "Image Upload !";
        header("Location: portfolio.php");
    }
}

if(isset($_POST['delete_image'])) {
    $id = $_POST['wdelete_id'];
    
    $query = "DELETE FROM portfolio WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);
    
    if($query_run) {
        $_SESSION['success'] = "Image Deleted !";
        header("Location: portfolio.php");
    } else {
        $_SESSION['status'] = "Image Not Deleted !";
        header("Location: portfolio.php");
    }
}

if(isset($_POST['image_update_btn'])) {
	$id = $_POST['edit_id'];
    $title = $_POST['edit_title'];
    $description = $_POST['edit_description'];
    $link = $_POST['edit_link'];
    
	$query = "UPDATE portfolio SET title='$title', description='$description', link='$link' WHERE id='$id'";
	$results = mysqli_query($connection, $query);
    if($results) {
        $_SESSION['success'] = "Image Updated";
        header("location: portfolio.php");
    } else {
        $_SESSION['status'] = "Image Not Updated";
        header("location: portfolio.php");
    }
}

/* ====================================================
                    Contac Me
==================================================================== */
if(isset($_POST['contact_me'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    
    $to = "ilaibens14@gmail.com";
    $message = "$name, Want's to talk with you. \nAbout: $subject";
    $from = "From: $name <$email>";
    
    mail($to, $subject, $message, $from);
    
    $_SESSION['success'] = "תודה שיצרתה איתנו קשר ! אחזור אלייך בהקדם האפשרי";
    header("Location: ../index.php");
}
?>