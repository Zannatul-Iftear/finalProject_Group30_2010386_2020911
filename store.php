<?php
  session_start();
  include 'calculateCartTotal.php';
  include 'identifyUser.php';
  
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["productID"]) && isset($_POST["quantity"])) {
    $productID = $_POST["productID"];
    $quantity = $_POST["quantity"];
    //echo 'Dog<br>Dog<br>Dog<br>Dog<br>Dog<br>Dog<br>Dog<br>Dog<br>Dog<br>Dog<br>';

    if($quantity>=1){

      // ----------- ADDING/UPDATING QUANTITY OF PRODUCT IN CART ----------------

      $conn = mysqli_connect('localhost','root','','mishti_db') or die('connection failed');
      $sql = "SELECT * FROM carts WHERE userID = '$userID' AND productID = '$productID'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // Row exists, update the quantity
        $row = $result->fetch_assoc();
        $existingQuantity = $row['quantity'];
        $newQuantity = $existingQuantity + $quantity;
    
        // Update the quantity for the existing row
        $updateQuery = "UPDATE carts SET quantity = '$newQuantity' WHERE userID = '$userID' AND productID = '$productID'";
        if ($conn->query($updateQuery) === TRUE) {
            //echo "Cart updated successfully!";
        } else {
            //echo "Error updating cart: " . $conn->error;
        }
      } else {
          // Row doesn't exist, insert a new row
          $insertQuery = "INSERT INTO carts (userID, productID, quantity) VALUES ('$userID', '$productID', '$quantity')";
          if ($conn->query($insertQuery) === TRUE) {
              //echo "Product added to cart successfully!";
          } else {
              //echo "Error adding product to cart: " . $conn->error;
          }
      }

      //echo 'Dog<br>Dog<br>Dog<br>Dog<br>Dog<br>Dog<br>Dog<br>Dog<br>Dog<br>Dog<br>';
      //echo $_SESSION['cart_total'];
      $conn->close();
    }
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

    <link id="stylesheet" rel="stylesheet" href="styleStore.css">
    <title>Store</title>
  </head>

  <body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <div id="navbarPlaceholder"></div>
    
    <div class="myContainer">

      <!-------------- Write Code Here: -------------->

      <div class="row" id="myRow" >
        <div class="col-md-8 mx-auto">
          <p class="pageTitle">Store</p>
          <p class="pageDescription">We offer sweets that are best in class. With years of experience in the sweetmeat business we are confident that our products will keep you coming back for more.</p>
        
          <div id="storeProductList">

            <!-- OLD Hardcoded Products List

            <div class="storeProductEntry" id="roshogolla">
              <img src="img/productImgRoshogolla.png" class="storeProductImg">
              <div class="storeProductDetails">
                <p class="storeProductName">Roshogolla</p>
                <p class="storeProductPrice">
                  <span class="productValue">350</span>tk per kg
                </p>
                <form class="formContainer">
                  <div>
                    <label for="inputQuantity">Quantity (kg):</label>
                    <input type="number" id="inputQuantity" name="inputQuantity" value="3" required>
                  </div>
                  <button type="button" class="myButton">Add to cart</button>
                </form>
              </div>
            </div>

            <div class="storeProductEntry" id="kalaJaam">
              <img src="img/productImgKalajaam.png" class="storeProductImg">
              <div class="storeProductDetails">
                <p class="storeProductName">Kala Jaam</p>
                <p class="storeProductPrice">
                  <span class="productValue">500</span>tk per kg
                </p>
                <form class="formContainer">
                  <div>
                    <label for="inputQuantity" id="formLabel">Quantity (kg):</label>
                    <input type="number" id="inputQuantity" name="inputQuantity" value="18" required>
                  </div>
                  <button type="button" class="myButton">Add to cart</button>
                </form>
              </div>
            </div>

            <div class="storeProductEntry" id="laddu">
              <img src="img/productImgLaddu.png" class="storeProductImg">
              <div class="storeProductDetails">
                <p class="storeProductName">Laddu</p>
                <p class="storeProductPrice">
                  <span class="productValue">420</span>tk per kg
                </p>
                <form class="formContainer">
                  <div>
                    <label for="inputQuantity">Quantity (kg):</label>
                    <input type="number" id="inputQuantity" name="inputQuantity" required>
                  </div>
                  <button type="button" class="myButton">Add to cart</button>
                </form>
              </div>
            </div>

            <div class="storeProductEntry" id="chchana">
              <img src="img/productImgChchana.png" class="storeProductImg">
              <div class="storeProductDetails">
                <p class="storeProductName">Chchana</p>
                <p class="storeProductPrice">
                  <span class="productValue">280</span>tk per kg
                </p>
                <form class="formContainer">
                  <div>
                    <label for="inputQuantity">Quantity (kg):</label>
                    <input type="number" id="inputQuantity" name="inputQuantity" value="5" required>
                  </div>
                  <button type="button" class="myButton">Add to cart</button>
                </form>
              </div>
            </div>
            -->

            <?php
              $conn = mysqli_connect('localhost','root','','mishti_db') or die('connection failed');
              $sql = "SELECT productID, name, price, image FROM `products`";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      $productID = $row["productID"];
                      $name = $row["name"];
                      $price = $row["price"];
                      $image = $row["image"];

                      echo '<div class="storeProductEntry" id="' . $productID . '">';
                      echo '<img src="uploaded_img/' . $image . '" class="storeProductImg">';
                      echo '<div class="storeProductDetails">';
                      echo '<p class="storeProductName">' . $name . '</p>';
                      echo '<p class="storeProductPrice">';
                      echo '<span class="productValue">' . $price . '</span>tk per kg';
                      echo '</p>';

                      echo '<form class="formContainer" method="post" action="store.php">';
                      echo '<div>';
                      echo '<label for="inputQuantity">Quantity (kg):</label>';
                      echo '<input type="number" id="inputQuantity" name="quantity" required>';
                      echo '<input type="hidden" name="productID" value=' . $productID . '>';
                      echo '</div>';
                      echo '<button type="submit" class="myButton">Add to cart</button>';
                      echo '</form>';
                      
                      echo '</div>';
                      echo '</div>';
                  }
              } else {
                  echo "No products found.";
              }
              $conn->close();
            ?>

          </div>

          <div class="bottomButtonContainer">
            <p></p>
            <a href="cart.php" class="myButton">view cart</a>
          </div>
        
        
        </div>
      </div>
      

















    </div>
    <div id="footerPlaceholder"></div>
  </body>
</html>
<script src="loadNavbar.js"></script>
<script src="loadFooter.js"></script>
