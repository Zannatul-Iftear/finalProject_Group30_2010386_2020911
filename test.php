<?php
  session_start();
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
    <title>Thank You</title>
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
          <p class="pageTitle">Order Confirmed</p>
          <h1>Thank you for shopping with us!<h1>
          <img src="img/successImg.png" id="successImg">
        </div>
      </div>



    </div>
    <div id="footerPlaceholder"></div>


    <!--
    <script>
      // Wait for the page to fully load
      window.addEventListener('load', function () {
        // Wait for 3 seconds (3000 milliseconds)
        setTimeout(function () {
          // Determine the redirection URL based on the session data
          var userType = "<?php echo $_SESSION['type']; ?>";
          var redirectUrl;

          if (userType === 'admin') {
            redirectUrl = 'admin_orders.php';
          } else if (userType === 'user') {
            redirectUrl = 'dashboard.php';
          } else {
            redirectUrl = 'index.html';
          }

          // Redirect to the determined URL
          window.location.href = redirectUrl;
        }, 3000);
      });
    </script> -->
  </body>
</html>
<script src="loadNavbar.js"></script>
<script src="loadFooter.js"></script>
