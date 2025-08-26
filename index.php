<?php
 date_default_timezone_set('Asia/Tokyo');
 session_start();

 if(!isset($_SESSION['response'])){
     $_SESSION['response'] = [];
 }

 if(isset($_POST['msg'])){
     array_push($_SESSION['response'],$_POST['msg']);
     if(count($_SESSION['response'])>10){
             array_shift($_SESSION['response']);
     }
 }

 $date = date("Y-m-d H:i");
?>

<!DOCTYPE html>

<html>
 <head>

 </head>

 <body>
 <p>____? who are you ?</p>
 <p>...!....<p>

 <form method="post">
   <input type="text" name="msg" value="">
   <button type="submit" name=button value="true">echo</button>
 </form>

 <p>---------...</p>

 <?php 
    foreach($_SESSION['response'] as $msg){
 ?>
     <p><?php echo $date . '______' . $msg; ?></p>
 <?php
  }
 ?>
 </body>

</html>
