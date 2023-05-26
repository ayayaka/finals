<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = "user";

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'User already exists!';
   }else{
      if($pass != $cpass){
         $message[] = 'Confirm password not matched!';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
         $message[] = 'Your account has been created successfully';
      }
   }

}

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Trippy Vault</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/logo.jpg">
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <!--custom css -->
    <link rel="stylesheet" href="style.css">
     <!--custom js -->
     <link rel="script" href="carousel.css">
    <!--font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




<section class="vh-100" style="background-color:#2596be;">
		<div class="container py-5 h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
			<div class="col col-xl-10">
				<div class="card" style="border-radius: 1rem;">
					<div class="row g-0">
						<div class="col-md-6 col-lg-5 d-none d-md-block">
						<img src="img/7.jpg" alt="login form" class="img-fluid shadow-1-strong" style="border-radius: 1rem 0 0 1rem;" />
						</div>
						<div class="col-md-6 col-lg-7 d-flex align-items-center">
						<div class="card-body p-4 p-lg-5 text-black">

   <form action="" method="post">
      
         <div class="d-flex align-items-center mb-3 pb-1">
					<img src="img/logo.jpg" class="mx-md-2" style="height: 50px; width: 50px;"/>
						<span class="h2 text-capitalize fw-bold mb-0">Create an Account</span>
					</div>
      <?php
         if(isset($message)){
            foreach($message as $message){
               echo '
               <div class="success">
                  <span>'.$message.'</span>
               </div>
               ';
            }
         }
      ?>
      <div class="form-outline mb-1">
      <label class="form-label " for="form2Example17">Enter Name:</label>
      <input type="text" name="name" id="form2Example27" class="form-control form-control-sm" required class="box">
      </div>
       
      <div class="form-outline mb-1">
      <label class="form-label " for="form2Example17">Enter Email: </label>
      <input type="email" name="email" id="form2Example27" class="form-control form-control-sm" required class="box">
      </div>

      <div class="form-outline mb-1">
      <label class="form-label " for="form2Example17">Enter Password: </label>
      <input type="password" name="password" id="form2Example27" class="form-control form-control-sm" required class="box">
      </div>

      <div class="form-outline mb-1">
      <label class="form-label " for="form2Example17">Enter Re-Password: </label>
      <input type="password" name="cpassword" id="form2Example27" class="form-control form-control-sm" required class="box">
      </div>

      <div class="pb-1 mb-1">
      <input type="submit" name="submit" value="Sign Up" class="btn btn-dark btn-sm">
      <p class="mb-2 pb-lg-1">Already have an account? <a href="login.php"  class="text-info">Log In here.</a></p>
   </form>
</section>
</div>

</body>
</html>