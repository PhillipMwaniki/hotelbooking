<?php require_once('../includes/header.php'); ?>
<?php
require_once('../config/config.php');


if (isset($_SESSION['username'])) {
    echo "<script>window.location.href='" . APP_URL . "'</script>";
}


if (isset($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        echo "<script>alert('One or more inputs are empty'); </script>";
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $qeury = $conn->query("SELECT * FROM users WHERE email='" . $email . "'");

        $qeury->execute();

        $user = $qeury->fetch(PDO::FETCH_ASSOC);

        if ($qeury->rowCount() > 0) {

            if (password_verify($password, $user['mypassword'])) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];

                header('location: ' . APP_URL . '/');
            } else {
                echo "<script>alert('Email or Password is incorrect'); </script>";
            }
        } else {
            echo "<script>alert('Email or Password is incorrect'); </script>";
        }

        header('location: login.php');
    }
}


?>


    <div class="hero-wrap js-fullheight" style="background-image: url('<?php echo APP_URL; ?>/images/image_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate">
          	<!-- <h2 class="subheading">Welcome to Vacation Rental</h2>
          	<h1 class="mb-4">Rent an appartment for your vacation</h1>
            <p><a href="#" class="btn btn-primary">Learn more</a> <a href="#" class="btn btn-white">Contact us</a></p> -->
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
    	<div class="container">
	    	<div class="row justify-content-middle" style="margin-left: 397px;">
	    		<div class="col-md-6 mt-5">
						<form action="login.php" method="POST" class="appointment-form" style="margin-top: -568px;">
							<h3 class="mb-3">Login</h3>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
			    					    <input name="email" type="email" class="form-control" placeholder="Email">
			    				    </div>
								</div>

                                <div class="col-md-12">
									<div class="form-group">
			    					    <input name="password" type="password" class="form-control" placeholder="Password">
			    				    </div>
								</div>



								<div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" name="submit" value="Login" class="btn btn-primary py-3 px-4">
                                    </div>
								</div>
							</div>
	    			</form>
	    		</div>
	    	</div>
	    </div>
    </section>

 <?php require_once('../includes/footer.php'); ?>
