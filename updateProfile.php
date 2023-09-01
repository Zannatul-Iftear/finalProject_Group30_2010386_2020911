<?php
session_start();

if(isset($_POST['submit'])){
    $conn = mysqli_connect('localhost','root','','mishti_db') or die('connection failed');
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $userID = $_SESSION['user_id'];

    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

      if(mysqli_num_rows($select_users)>0 && $email != $_SESSION['user_email']){
        $message[] = 'This email is already in use!';
      }
      else {
        if($pass != $cpass){
          $message[] = 'Confirmed password does not match!';
        }
        else{
          $updateQuery = "UPDATE users
          SET name = '$name', email = '$email', password = '$cpass'
          WHERE userID = '$userID'";
  
          if ($conn->query($updateQuery) === TRUE) {
          echo "User information updated successfully!";
          } else {
          echo "Error updating user information: " . $conn->error;
          }
  
          $_SESSION['user_name'] = $name;
          $_SESSION['user_email'] = $email;
          if($_SESSION['type'] == 'admin') {header('location:admin.php');}
          else {header('location:dashboard.php');}
  
          // Close the database connection
          $conn->close();
        }
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
    <title>Edit Profile</title>
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
            <p class="pageTitle">Edit Profile</p>

            <div class="form-container">

               <form action="" method="post">
                  <h3>Enter updated details:</h3>
                  <input type="text" name="name" value="<?php echo $_SESSION['user_name']; ?>" required class="box">
                  <input type="email" name="email" value="<?php echo $_SESSION['user_email']; ?>" required class="box">
                  <input type="password" name="password" placeholder="Password" required class="box">
                  <input type="password" name="cpassword" placeholder="Confirm Password" required class="box">
                  <br><input type="submit" name="submit" value="confirm" class="myButton">
               </form>
               
            </div>
         </div>
      </div>
      <div id="footerPlaceholder"></div>
   </body>
</html>
<script src="loadNavbar.js"></script>
<script src="loadFooter.js"></script>