<?php
  session_start();
  session_unset();

  $conn = mysqli_connect('localhost','root','','mishti_db') or die('connection failed');
  $deleteQuery = "DELETE FROM carts";
  if ($conn->query($deleteQuery) === TRUE) {
    //echo "Carts table cleared successfully!";
  } else {
    //echo "Error clearing carts table: " . $conn->error;
  }
  $conn->close();
  header('location:index.html');


  $userIP = $_SERVER['REMOTE_ADDR'];        
  $userAgent = $_SERVER['HTTP_USER_AGENT'];
  $_SESSION['user_id'] = abs(crc32(md5($userIP . $userAgent)));
?>