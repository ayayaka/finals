<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
<div class="container-fluid">
<header class="header">
   <div class="flex">
      <div class="col-md-2 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
        <img src="img/logo.jpg" alt="" width="50" height="50">
        </a>
      </div>
      <a href="admin_page.php" class="logo">Admin<span style="color: #33b5e5">Dashboard</span></a>
      <nav class="navbar">
         <a href="admin_page.php" class="nav-link px-2 text-info" style="color: #33b5e5">Home</a>
         <a href="admin_products.php" class="nav-link px-2 text-info" style="color: #33b5e5">Products</a>
         <a href="admin_orders.php" class="nav-link px-2 text-info" style="color: #33b5e5">Orders</a>
         <a href="admin_users.php" class="nav-link px-2 text-info" style="color: #33b5e5">Users</a>
      </nav>
      <div class="col-md-2 text-right">
        <a class="btn btn-info" style="background: #33b5e5; color: white; text-decoration: none "><?php echo $_SESSION['admin_name']; ?></a> 
        <a href="logout.php" class="btn btn-outline-info me-2" style="background: white; color: #33b5e5; text-decoration: none">Log Out</a>
      </div>

   </div>
</div>
</header>