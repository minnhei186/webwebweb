<?php
 date_default_timezone_set('Asia/Tokyo');
 session_start();

// if(!isset($_SESSION['response'])){
//     $_SESSION['response'] = [];
// }
//
// if(isset($_POST['msg'])){
//     array_push($_SESSION['response'],$_POST['msg']);
//     if(count($_SESSION['response'])>10){
//             array_shift($_SESSION['response']);
//     }
// }

 $file = __DIR__ . '/data/msg';
 if(file_exists($file)){
     $msg_list = unserialize(file_get_contents($file));
 }else{
     $msg_list = [];
 }
 
 if(isset($_POST['msg'])){
     array_push($msg_list,$_POST['msg']);
 }

 if(!is_dir(dirname($file))){
     mkdir(dirname($file),0700,true);
 }
 
 file_put_contents($file, serialize($msg_list)); 
 
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
    foreach($msg_list as $msg){
 ?>
     <p><?php echo $date . '______' . $msg; ?></p>
 <?php
  }
 ?>
 </body>

</html>
