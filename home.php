<?php
session_start();

include "config.php";
if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {

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
    <link rel="stylesheet" href="css/products.css">
  </head>
  <body>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <?php include 'header.php'; ?>

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
<?php
      if(isset($_POST['add_to_cart'])) {
          $user_id = $_SESSION['user_id'];
          $product_name = $_POST['product_name'];
          $product_price = $_POST['product_price'];
          $product_image = $_POST['product_image'];
          $product_quantity = $_POST['product_quantity'];

          $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

          if(mysqli_num_rows($check_cart_numbers) > 0) {
              $message[] = 'already added to cart!';
          } else {
              mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '1', '$product_image')") or die('query failed');
              $message[] = 'product added to cart!';
          }
      }
    ?>


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
        <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
        <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
        <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
        <input type="submit" value="add to cart" name="add_to_cart" class="btn">
        </form>
        <?php
        }
    } else {
        echo '<p class="empty">no products added yet!</p>';
    }
    ?>
      </div>
      <div class="load-more" style="margin-top: 2rem; text-align:center">
        <a href="shop.php" class="option-btn">load more</a>
      </div>
  </section>

<?php
    include "footer.php";
    ?>

</body>
</html>

<?php
} else {
    header("Location: login.php");
    exit();
}
?>