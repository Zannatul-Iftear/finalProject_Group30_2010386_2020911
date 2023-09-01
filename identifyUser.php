<?php
  if (isset($_SESSION['type'])) {
    if($_SESSION['type'] == 'admin') {$userID = $_SESSION['admin_id'];}
    else {$userID = $_SESSION['user_id'];}
  }
  else {
    $userIP = $_SERVER['REMOTE_ADDR'];        
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $userID = abs(crc32(md5($userIP . $userAgent)));
  }
?>