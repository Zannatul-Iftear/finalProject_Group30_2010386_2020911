<?php
    session_start();
    if($_SESSION['type'] == 'admin') {header('location:admin_page.php');}
    else if ($_SESSION['type'] != 'user') {header('location:login.php');}
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

    <link id="stylesheet" rel="stylesheet" href="styleDashboard.css">
    <title>Dashboard</title>
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
          <p class="pageTitle">Dashboard</p>
          <div id="userInfoContainer">
            <div id="userImgInfo">
              <img src="img/iconDashboard.png" id="userImg">
              <div id="userInfo">
                <h1><?php echo $_SESSION['user_name']; ?></h1>
                <h2><?php echo $_SESSION['user_email']; ?></h2>
              </div>
            </div>
            <div id="userEditButtonContainer">
              <a href="updateProfile.php" class="myButton">edit profile</a>
              <button class="myButton" id="logoutButton">Logout</button>
            </div>
          </div>

          <!--------------- Products List --------------->

          <h1>My Orders:</h1>
          <div class="dashboardList">

            <!-- OLD Hardcoded Orders List

            <div class="dashboardListEntry" id="roshogolla">
              <div class="dashboardListDetails">
                <div class="dashboardListSerial">1.</div>
                <div class="dashboardListText">
                  <h1 id="productNameLabel">15/08/2023</h1>
                  <h2 id="quantityPriceLabel">35kg: 13,000tk</h2>
                  <h2 id="addressLabel">House, Road, Address</h2>
                  <h2 id="phoneNumberLabel">01987654321</h2>
                </div>
              </div>
              <div class="dashboardListButtons">
                <h1 id="statusLabel"><i>Pending</i></h1>
              </div>
            </div>

            <div class="dashboardListEntry" id="laddu">
              <div class="dashboardListDetails">
                <div class="dashboardListSerial">3.</div>
                <div class="dashboardListText">
                  <h1 id="productNameLabel">16/08/2023 05:00</h1>
                  <h2 id="productPriceLabel">1,65,000tk</h2>
                </div>
              </div>
              <div class="dashboardListButtons">
                <button class="myButton" id="editButton">Details</button>
              </div>
            </div>

            <div class="dashboardListEntry" id="chchana">
              <div class="dashboardListDetails">
                <div class="dashboardListSerial">4.</div>
                <div class="dashboardListText">
                  <h1 id="productNameLabel">24/09/2023 13:00</h1>
                  <h2 id="productPriceLabel">12tk</h2>
                </div>
              </div>
              <div class="dashboardListButtons">
                <button class="myButton" id="editButton">Details</button>
              </div>
            </div>

            <div class="dashboardListEntry" id="chchana">
              <div class="dashboardListDetails">
                <div class="dashboardListSerial">5.</div>
                <div class="dashboardListText">
                  <h1 id="productNameLabel">29/09/2023 06:35</h1>
                  <h2 id="productPriceLabel">2,500tk</h2>
                </div>
              </div>
              <div class="dashboardListButtons">
                <button class="myButton" id="editButton">Details</button>
              </div>
            </div>

            -->

            <?php
              $conn = mysqli_connect('localhost','root','','mishti_db') or die('connection failed');
              $currentUser=$_SESSION['user_id'];
              $sql = "SELECT orderID, userID, userName, address, phone, quantity, total, paystatus, date 
                      FROM orders WHERE userID=$currentUser ORDER BY date DESC";
              $result = $conn->query($sql);

              $serialNumber = 1;

              if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      $orderID = $row['orderID'];
                      $date = $row['date'];
                      $quantity = $row['quantity'];
                      $total = $row['total'];
                      $address = $row['address'];
                      $phone = $row['phone'];
                      $status = $row['paystatus'];

                      echo '<div class="dashboardListEntry" id="' . $orderID . '">';
                      echo '<div class="dashboardListDetails">';
                      echo '<div class="dashboardListSerial">' . sprintf('%02d', $serialNumber) . '</div>';
                      echo '<div class="dashboardListText">';
                      echo '<h1 id="productNameLabel">' . $date . '</h1>';
                      echo '<h2 id="quantityPriceLabel">' . $quantity . 'kg: <b><i>' . number_format($total) . 'tk</i></b></h2>';
                      echo '<h2 id="addressLabel">' . $address . '</h2>';
                      echo '<h2 id="phoneNumberLabel">' . $phone . '</h2>';
                      echo '</div>';
                      echo '</div>';
                      echo '<div class="dashboardListButtons">';
                      echo '<h3 id="statusLabel"><i>' . $status . '</i></h3>';
                      echo '</div>';
                      echo '</div>';

                      $serialNumber++;
                  }
              } else {
                  echo '<p>No orders found.</p>';
              }

              // Close the database connection
              $conn->close();
            ?>            
          </div>


    
        </div>
      </div>















    </div>
    <div id="footerPlaceholder"></div>
  </body>
</html>
<script src="loadNavbar.js"></script>
<script src="loadFooter.js"></script>

<!-- LOGOUT CODE FROM CHAT GPT -->

<script>
// Attach a click event listener to the button
document.getElementById("logoutButton").addEventListener("click", function() {
    // Create an AJAX request
    var xhr = new XMLHttpRequest();
    
    // Define the PHP script to call
    var phpScript = "logout.php"; // Replace with the actual filename
    
    // Configure the AJAX request
    xhr.open("GET", phpScript, true);
    
    // Define the callback function
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Handle the response here if needed
            // For example, you could redirect using JavaScript
            window.location.href = "index.html";
        }
    };
    
    // Send the AJAX request
    xhr.send();
});
</script>


