<!doctype html>

<?php
    include "config.php";
?>
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

      <!-- custom css file link  -->
    <link rel="stylesheet" href="css/products.css">
  </head>
  <body>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    

  
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-4 mb-4 border-bottom" style="font-size: 1.6rem">
      <div class="col-md-2 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
        <img src="img/logo.jpg" alt="" width="50" height="50">
        </a>
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li class="nav-item"><a href="#sectionB" class="nav-link px-2 text-info">New Products</a></li>
        <li class="nav-item"><a href="shop.php" class="nav-link px-2 text-info">All Products</a></li>
        <li class="nav-item"><a href="about.php" class="nav-link px-2 text-info">About us</a></li>
      </ul>

      <div class="col-md-2 text-right">
        <a href="login.php" class="btn btn-outline-info me-2" style="text-decoration: none">Login</a>
        <a href="register.php" class="btn btn-info" style="text-decoration: none">Sign-up</a>
      </div>
    </header>


    <div class="container-fluid">
            <div class="row">
            <div class="col-md-3 mb-1 mb-lg-0">
            <img
            src="img/1.jpg"
            class="w-100  shadow-1-strong rounded mb-3"
            alt=""/>

            <img
            src="img/gray.png"
            class="w-100 h-30 shadow-1-strong rounded mb-3"
            alt=""/></div>

            <div class="col-md-3 mb-1 mb-lg-0">
            <img
            src="img/gray.png"
            class="w-100 h-30 shadow-1-strong rounded mb-3"
            alt=""/>

            <img
            src="img/2.jpg"
            class="w-100 shadow-1-strong rounded mb-3"
            alt=""/></div>

            <div class="col-md-3 mb-1 mb-lg-0">
            <img
            src="img/3.jpg"
            class="w-100 shadow-1-strong rounded mb-3"
            alt=""/>
            <img
            src="img/gray.png"
            class="w-100 h-30 shadow-1-strong rounded mb-3"
            alt=""/></div>

            <div class="col-md-3 mb-1 mb-lg-0">
            <img
            src="img/gray.png"
            class="w-100 h-100 shadow-1-strong rounded "
            alt=""/></div>
        </div>
    </div>


    <div class="b-example-divider"></div>
    
    <div class="container-fluid mb-4 mx-4">
        <h2>FEATURED PRODUCTS</h2>
    </div>

    <section class="products">
      <div class="box-container">
        <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
if(mysqli_num_rows($select_products) > 0) {
    while($fetch_products = mysqli_fetch_assoc($select_products)) {
        ?>
            
                <form action="" method="post" class="box">
                <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
                <div class="name"><?php echo $fetch_products['name']; ?></div>
                <div class="price">₱<?php echo $fetch_products['price']; ?></div>
                <!-- <input type="number" min="1" name="product_quantity" value="1" class="qty"> -->
                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                <!-- <input type="submit" value="add to cart" name="add_to_cart" class="btn"> -->
                </form>
                <?php
    }
} else {
    echo '<p class="empty">No products added yet!</p>';
}
?>
      </div>
      <div class="load-more" style="margin-top: 2rem; text-align:center; font-size: 1.5rem;">
        <a href="shop.php" class="option-btn">Load More</a>
      </div>
  </section>

    </div>
  </div>
</div>

<?php
    include "footer.php";
?>

  </body>
</html>