<?php
  session_start();
  include 'calculateCartTotal.php';
  include 'identifyUser.php';

  // --------------- REMOVE BUTTON ON CLICK ---------------

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteCartID"])) {
    $deleteCartID = $_POST["deleteCartID"];
    $conn = mysqli_connect('localhost','root','','mishti_db') or die('connection failed');
    // Perform the deletion based on the deleteCartID
    $deleteQuery = "DELETE FROM carts WHERE cartID = '$deleteCartID'";
    if ($conn->query($deleteQuery) === TRUE) {
        //echo "Row deleted successfully!";
    } else {
       // echo "Error deleting row: " . $conn->error;
    }
    $conn->close();
  }

  // --------------- PLUS/MINUS BUTTON ON CLICK ---------------

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateCartID"]) && isset($_POST["action"])) {
    $updateCartID = $_POST["updateCartID"];
    $action = $_POST["action"];
              
    $conn = mysqli_connect('localhost','root','','mishti_db') or die('connection failed');
    // Update the quantity based on the action
    if ($action === "increment") {
      $updateQuery = "UPDATE carts SET quantity = quantity + 1 WHERE cartID = '$updateCartID'";
    } elseif ($action === "decrement") {
      $updateQuery = "UPDATE carts SET quantity = quantity - 1 WHERE cartID = '$updateCartID' AND quantity > 0";
    }
              
    if ($conn->query($updateQuery) === TRUE) {
      //echo "Quantity updated successfully!";
    } else {
      //echo "Error updating quantity: " . $conn->error;
    }
    $conn->close();
  }
  include 'calculateCartTotal.php';
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

    <link id="stylesheet" rel="stylesheet" href="styleCart.css">
    <title>Cart</title>
  </head>

  <body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <div id="navbarPlaceholder"></div>
    
    <div class="myContainer">
      
      <!-------------- Write Code Here: -------------->

      <div class="row" id="myRow">
        <div class="col-md-8 mx-auto">
          <p class="pageTitle">My Cart</p>

          <div id="cartList">

            <!-- OLD Hardcoded Cart List

            <div class="cartEntry" id="roshogolla">
              <div class="cartDetails">
                <div class="cartSerial">1.</div>
                <div class="cartNamePrice">
                  <p class="cartName">Roshogolla</p>
                  <p class="cartPrice">
                    <span class="quantity">3</span>kg: 
                    <span class="price">1050</span>tk
                  </p>
                </div>
              </div>
              <div class="cartButtons">
                <button class="myButton">Edit</button>
                <button class="altButton">X</button>
              </div>
            </div>

            <div class="cartEntry" id="kalaJaam">
              <div class="cartDetails">
                <div class="cartSerial">2.</div>
                <div class="cartNamePrice">
                  <p class="cartName">Kala Jaam</p>
                  <p class="cartPrice">
                    <span class="quantity">18</span>kg: 
                    <span class="price">9000</span>tk
                  </p>
                </div>
              </div>
              <div class="cartButtons">
                <button class="myButton">Edit</button>
                <button class="altButton">X</button>
              </div>
            </div>

            <div class="cartEntry" id="roshogolla">
              <div class="cartDetails">
                <div class="cartSerial">3.</div>
                <div class="cartNamePrice">
                  <p class="cartName">Chchana</p>
                  <p class="cartPrice">
                    <span class="quantity">5</span>kg: 
                    <span class="price">1400</span>tk
                  </p>
                </div>
              </div>
              <div class="cartButtons">
                <button class="myButton">Edit</button>
                <button class="altButton">X</button>
              </div>
            </div>

            -->

            <?php
              // Create a new database connection
              $conn = mysqli_connect('localhost','root','','mishti_db') or die('connection failed');

              // SQL query to fetch cart data along with product details
              $sql = "SELECT carts.cartID, carts.productID, carts.quantity, products.name, products.price
                      FROM carts
                      INNER JOIN products ON carts.productID = products.productID
                      WHERE carts.userID = $userID";
              $result = $conn->query($sql);

              $serialNumber = 1;

              if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      $cartID = $row['cartID'];
                      $name = $row['name'];
                      $price = $row['price'];
                      $quantity = $row['quantity'];
                      $total = $price * $quantity;

                      if($quantity==0) {continue;}

                      echo '<div class="cartEntry" id="' . $cartID . '">';
                      echo '<div class="cartDetails">';
                      echo '<div class="cartSerial">' . sprintf('%02d', $serialNumber) . '</div>'; // Auto-increment from 01
                      echo '<div class="cartNamePrice">';
                      echo '<p class="cartName">' . $name . '</p>';
                      echo '<p class="cartPrice">';
                      echo '<span class="quantity">' . $quantity . '</span>kg: ';
                      echo '<span class="price">' . $total . '</span>tk';
                      echo '</p>';
                      echo '</div>';
                      echo '</div>';
                      
                      echo '<div class="cartButtons">';
                      echo '<form method="post" action="cart.php">';
                      echo '<input type="hidden" name="updateCartID" value="' . $cartID . '">';
                      echo '<input type="hidden" name="action" value="increment">';
                      echo '<button type="submit" class="myButton">+</button>';
                      echo '</form>';
                      echo '<form method="post" action="cart.php">';
                      echo '<input type="hidden" name="updateCartID" value="' . $cartID . '">';
                      echo '<input type="hidden" name="action" value="decrement">';
                      echo '<button type="submit" class="myButton">-</button>';
                      echo '</form>';
                      echo '<form method="post" action="cart.php">';
                      echo '<input type="hidden" name="deleteCartID" value="' . $cartID . '">';
                      echo '<button type="submit" class="altButton" name="deleteButton">Remove</button>';
                      echo '</form>';
                      echo '</div>';
                      echo '</div>';

                      $serialNumber++;
                  }
              } else {
                  echo '<p>No items in the cart.</p>';
              }

              // Close the database connection
              $conn->close();
            ?>

          </div>

          <p id="totalLabel">
            Total:
            <span id="totalAmount"><?php echo $_SESSION['cart_total']; ?></span><span>tk</span>
          </p>

          <input type="checkbox" id="wrappingPaperCheckbox" name="wrappingPaperCheckbox" checked>
          <label for="wrappingPaperCheckbox" id="checkboxLabel">Include Wrapping Paper</label>

          <div class="bottomButtonContainer">
            <button class="altButton" id="backButton">store</button>
            <button class="myButton" id="nextButton">Next</button>
          </div>
          <script>
            document.getElementById("backButton").addEventListener("click", function() {
              window.location.href = "store.php";});
          </script>
    
        </div>
      </div>















    </div>
    <div id="footerPlaceholder"></div>
  </body>
</html>
<script src="loadNavbar.js"></script>
<script src="loadFooter.js"></script>

<!-- REDIRECT CODE FROM CHAT GPT -->

<script>
// Attach a click event listener to the button
document.getElementById("nextButton").addEventListener("click", function() {
    // Check if the checkbox is checked
    <?php
      if($_SESSION['cart_total']==0){
        header('location:cart.php');
      }
    ?>


    var checkboxChecked = document.getElementById("wrappingPaperCheckbox").checked;
    
    // Define the target URL based on the checkbox status
    var targetUrl = checkboxChecked ? "wrappingPaper.php" : "payment.php";
    
    // Redirect to the appropriate URL
    window.location.href = targetUrl;
});
</script>