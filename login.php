<?php

include 'connect.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $row = mysqli_fetch_assoc($select_users);
      $currentID=$row['userID'];
      $updateQuery = "UPDATE carts SET userID = '$currentID'";
      if ($conn->query($updateQuery) === TRUE) {
         //echo "UserID updated successfully for all rows!";
     } else {
         //echo "Error updating userID: " . $conn->error;
     }
      $_SESSION['type'] = $row['type'];

      if($_SESSION['type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $currentID;
         header('location:admin_page.php');

      }elseif($_SESSION['type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $currentID;
         header('location:index.html');

      }

   }else{
      $message[] = 'Incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
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
    <title>Login</title>
   </head>



   <body>

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

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <div id="navbarPlaceholder"></div>
         
      <div class="myContainer">
         <div class="col-md-8 mx-auto">
            <p class="pageTitle">Login</p>

            <div class="form-container">

               <form action="" method="post">
                  <h3>Enter Login Details:</h3>
                  <input type="email" name="email" placeholder="Email" required class="box">
                  <input type="password" name="password" placeholder="Password" required class="box">
                  <br><input type="submit" name="submit" value="Login" class="myButton">
                  <p>Don't have an account yet? <a href="registration.php">REGISTER</a></p>
               </form>

            </div>
         </div>
      </div>
      <div id="footerPlaceholder"></div>

      <!-- Code injected by live-server -->
      <script>
         // <![CDATA[  <-- For SVG support
         if ('WebSocket' in window) {
            (function () {
               function refreshCSS() {
                  var sheets = [].slice.call(document.getElementsByTagName("link"));
                  var head = document.getElementsByTagName("head")[0];
                  for (var i = 0; i < sheets.length; ++i) {
                     var elem = sheets[i];
                     var parent = elem.parentElement || head;
                     parent.removeChild(elem);
                     var rel = elem.rel;
                     if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
                        var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                        elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
                     }
                     parent.appendChild(elem);
                  }
               }
               var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
               var address = protocol + window.location.host + window.location.pathname + '/ws';
               var socket = new WebSocket(address);
               socket.onmessage = function (msg) {
                  if (msg.data == 'reload') window.location.reload();
                  else if (msg.data == 'refreshcss') refreshCSS();
               };
               if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                  console.log('Live reload enabled.');
                  sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
               }
            })();
         }
         else {
            console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
         }
         // ]]>
      </script>
   </body>
</html>
<script src="loadNavbar.js"></script>
<script src="loadFooter.js"></script>