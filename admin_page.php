<?php

include 'connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="img/favicon.png" type="image/png">
   <title>ADMIN: Dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="admin_style.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<!-- admin dashboard section starts  -->

<section class="dashboard">

   <h1 class="title">dashboard</h1>

   <div class="box-container">

      <div class="box">
         <?php
            $total_pendings = 0;
            $select_pending = mysqli_query($conn, "SELECT total FROM `orders` WHERE paystatus = 'pending'") or die('query failed');
            if(mysqli_num_rows($select_pending) > 0){
               while($fetch_pendings = mysqli_fetch_assoc($select_pending)){
                  $total_price = $fetch_pendings['total'];
                  $total_pendings += $total_price;
               };
            };
         ?>
         <img src="img/iconAdmin01.png" alt="" class="dashImg">
         <h3><?php echo number_format($total_pendings); ?>tk</h3>
         <p>total pendings</p>
      </div>

      <div class="box">
         <?php
            $total_completed = 0;
            $select_completed = mysqli_query($conn, "SELECT total FROM `orders` WHERE paystatus = 'completed'") or die('query failed');
            if(mysqli_num_rows($select_completed) > 0){
               while($fetch_completed = mysqli_fetch_assoc($select_completed)){
                  $total_price = $fetch_completed['total'];
                  $total_completed += $total_price;
               };
            };
         ?>
         <img src="img/iconAdmin02.png" alt="" class="dashImg">
         <h3><?php echo number_format($total_completed); ?>tk</h3>
         <p>completed payments</p>
      </div>

      <div class="box">
         <?php 
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
            $number_of_orders = mysqli_num_rows($select_orders);
         ?>
         <img src="img/iconAdmin03.png" alt="" class="dashImg">
         <h3><?php echo number_format($number_of_orders); ?></h3>
         <p>order placed</p>
      </div>

      <div class="box">
         <?php 
            $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
            $number_of_products = mysqli_num_rows($select_products);
         ?>
         <img src="img/iconAdmin04.png" alt="" class="dashImg">
         <h3><?php echo number_format($number_of_products); ?></h3>
         <p>products added</p>
      </div>

      <div class="box">
         <?php 
            $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE type = 'user'") or die('query failed');
            $number_of_users = mysqli_num_rows($select_users);
         ?>
         <img src="img/iconAdmin05.png" alt="" class="dashImg">
         <h3><?php echo number_format($number_of_users); ?></h3>
         <p>normal users</p>
      </div>

      <div class="box">
         <?php 
            $select_admins = mysqli_query($conn, "SELECT * FROM `users` WHERE type = 'admin'") or die('query failed');
            $number_of_admins = mysqli_num_rows($select_admins);
         ?>
         <img src="img/iconAdmin06.png" alt="" class="dashImg">
         <h3><?php echo number_format($number_of_admins); ?></h3>
         <p>admin users</p>
      </div>

      <div class="box">
         <?php 
            $select_account = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
            $number_of_account = mysqli_num_rows($select_account);
         ?>
         <img src="img/iconAdmin07.png" alt="" class="dashImg">
         <h3><?php echo number_format($number_of_account); ?></h3>
         <p>total accounts</p>
      </div>

   </div>

   <div id="weblink-container">
      <img src="img/iconGlobe.png" alt="" id="weblink-img">
      <a href="index.html" id="weblink">Visit Website</a>
   </div>

</section>

<!-- admin dashboard section ends -->









<!-- custom admin js file link  -->
<script src="admin_script.js"></script>
</body>
</html>
