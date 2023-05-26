<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['admin_email'])) {

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
  </head>
  <body>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <div class="container-fluid">
    <header class="d-flex flex-wrap  align-items-center justify-content-center justify-content-md-between py-4 mb-4 border-bottom" style="font-size: 22px">
      <div class="col-md-2 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
        <img src="img/logo.jpg" alt="" width="50" height="50">
        </a>
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li class="nav-item"><a href="" class="nav-link px-2 text-info">Home</a></li>
        <li class="nav-item"><a href="" class="nav-link px-2 text-info">Products</a></li>
        <li class="nav-item"><a href="" class="nav-link px-2 text-info">Orders</a></li>
        <li class="nav-item"><a href="admin_users.php" class="nav-link px-2 text-info">Users</a></li>
      </ul>

      <div class="col-md-2 text-right">
        <button type="button" class="btn btn-outline-info me-2"><span class="bi bi-cart"></span></button>
        <a class="btn btn-info" style="text-decoration: none"><?php echo $_SESSION['admin_name']; ?></a> 
        <a href="logout.php" class="btn btn-outline-info me-2" style="text-decoration: none">Log Out</a>
      </div>
    </header>
</div>

    </div>
  </div>
</div>
</section>

</body>
</html>

<?php 
}else{
     header("Location: login.php");
     exit();
}
 ?>