<?php
  $conn = mysqli_connect('localhost','root','','mishti_db') or die('connection failed');
  include 'identifyUser.php';

      $sql = "SELECT * FROM carts WHERE userID = '$userID'";
      $result = $conn->query($sql);
      $total = 0;

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $productID = $row['productID'];
            $quantity = $row['quantity'];
    
            // Fetch the price from the "products" table based on the productID
            $priceQuery = "SELECT price FROM products WHERE productID = '$productID'";
            $priceResult = $conn->query($priceQuery);
    
            if ($priceResult->num_rows > 0) {
                $priceRow = $priceResult->fetch_assoc();
                $price = $priceRow['price'];
    
                // Calculate the subtotal for this row
                $subtotal = $price * $quantity;
    
                // Add the subtotal to the total
                $total += $subtotal;
            }
        }
      } else {echo "No matching rows found.";}
      $_SESSION['cart_total']=$total;
      //echo 'Dog<br>Dog<br>Dog<br>Dog<br>Dog<br>Dog<br>Dog<br>Dog<br>Dog<br>Dog<br>';
      //echo $_SESSION['cart_total'];
      $conn->close();
?>