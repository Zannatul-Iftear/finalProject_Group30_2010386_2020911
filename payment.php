<?php
  session_start();
  include 'calculateCartTotal.php';
  include 'identifyUser.php';

  $conn = mysqli_connect('localhost','root','','mishti_db') or die('connection failed');
  if(isset($_POST['submit'])){
    $userName=mysqli_real_escape_string($conn, $_POST['name']);
    $address=mysqli_real_escape_string($conn, $_POST['address']);
    $phone=mysqli_real_escape_string($conn, $_POST['phone']);
    $total=$_SESSION['cart_total'];



    $sql = "SELECT * FROM carts WHERE userID = '$userID'";
    $result = $conn->query($sql);
    $quantity = 0;

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $quantity+=$row['quantity'];
      }
    } else {echo "No matching rows found.";}
    
    mysqli_query($conn, "INSERT INTO `orders`(userID, userName, address, phone, quantity, total) VALUES('$userID', '$userName', '$address', '$phone', '$quantity', '$total')") or die('query failed');
    $deleteQuery = "DELETE FROM carts";
    if ($conn->query($deleteQuery) === TRUE) {
      //echo "Carts table cleared successfully!";
    } else {
      //echo "Error clearing carts table: " . $conn->error;
    }
    $conn->close();
    header('location:test.php');
  }

?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,900|Ubuntu:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link id="stylesheet" rel="stylesheet" href="styleMain.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <link rel="icon" href="img/favicon.png" type="image/png">

    <!------- Stylesheet and Page Title: ------->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link id="stylesheet" rel="stylesheet" href="styleNurul.css">
    <title>Payment</title>
  </head>










  <body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <div id="navbarPlaceholder"></div>

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
    
    <div class="myContainer">

      <div class="row" id="myRow">
        <div class="col-md-8 mx-auto">
          <p class="pageTitle">Payment</p>

          <div class="form-container">
            <form action="" method="post">
              <div class="row">

                <div class="col md-6">
                  <h3>Buyer Information:</h3>
                  <input type="text" name="name" placeholder="Full Name" required class="box">
                  <input type="text" name="address" placeholder="Delivery Address" required class="box">
                  <input type="text" name="phone" placeholder="Phone Number" required class="box">
                  <div id="displayinfo">
                    <h1>Payment: <b id="payment"><?php echo $total; ?>tk</b></h1>
                    <p>☑ Cash on delivery</p>
                    <p><i>Online payment coming soon!</i></p>
                  </div>
                </div>
  
                <!--
                <div class="col md-6">
                  <h3>Payment Information:</h3>
                  <input type="text" name="cardname" placeholder="Card Name" required class="box">
                  <input type="number" name="cardnumber" placeholder="Card Number" required class="box">
                  <input type="number" name="cvc" placeholder="CVC" required class="box">
                  <input type="number" name="month" placeholder="Month" required class="box2">
                  <span class="slash">/</span>
                  <input type="number" name="year" placeholder="Year" required class="box2">
                  
                </div>
                -->

              </div>

              <div id="buttonsContainer">
                <button class="altButton" id="backButton">Back</button>
                <input type="submit" name="submit" value="confirm" class="myButton">
              </div>
              <script>
                document.getElementById("backButton").addEventListener("click", function() {
                  window.history.back();});
              </script>

            </form>
          </div>          
        </div>
      </div>





    </div>
    <div id="footerPlaceholder"></div>
  </body>
</html>
<script src="loadNavbar.js"></script>
<script src="loadFooter.js"></script>

