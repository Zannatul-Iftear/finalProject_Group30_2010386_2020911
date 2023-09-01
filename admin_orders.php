<?php

include 'connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_POST['update_order'])){

   $order_update_id = $_POST['order_id'];
   $update_payment = $_POST['update_payment'];
   mysqli_query($conn, "UPDATE `orders` SET paystatus = '$update_payment' WHERE orderID = '$order_update_id'") or die('query failed');
   $message[] = 'payment status has been updated!';

}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_orders.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="img/favicon.png" type="image/png">
   <title>ADMIN: Orders</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="admin_style.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="orders">

   <h1 class="title">update orders</h1>

   <div class="box-container">
      <?php
      $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
      if(mysqli_num_rows($select_orders) > 0){
         while($fetch_orders = mysqli_fetch_assoc($select_orders)){
      ?>
      <div class="box">
         <p class="boxTitle"> Order <?php echo $fetch_orders['orderID']; ?></p>
         <p> User ID : <span><?php echo $fetch_orders['userID']; ?></span> </p>
         <p> Placed on : <span><?php echo $fetch_orders['date']; ?></span> </p>
         <p> Name : <span><?php echo $fetch_orders['userName']; ?></span> </p>
         <p> Phone : <span><?php echo $fetch_orders['phone']; ?></span> </p>
         <p> Address : <span><?php echo $fetch_orders['address']; ?></span> </p>
         <p> Total Quantity : <span><?php echo $fetch_orders['quantity']; ?></span> </p>
         <p> Total Price : <span><?php echo number_format($fetch_orders['total']); ?>tk</span> </p>
         <form action="" method="post">
            <input type="hidden" name="order_id" value="<?php echo $fetch_orders['orderID']; ?>">
            <select name="update_payment">
               <option value="" selected disabled><?php echo $fetch_orders['paystatus']; ?></option>
               <option value="Pending">Pending</option>
               <option value="Completed">Completed</option>
            </select>
            <input type="submit" value="update status" name="update_order" class="option-btn">
         </form>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">no orders placed yet!</p>';
      }
      ?>
   </div>

</section>










<!-- custom admin js file link  -->
<script src="admin_script.js"></script>

</body>
</html>