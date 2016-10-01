<?php
include "engine/functions.php";
include "engine/kony.php";

//theyre logged in
if (isset($_SESSION['user'])) {
  //theyre coming here from out of state, redirect them to their page
  if (explode( '.',$_SERVER['HTTP_REFERER'])[2] != 'nitrousbox') {
    header( 'Location: ./workspace.php' ) ;
  }
}


//theyre logging in
if (isset($_POST['toaster']) && isset($_POST['oven']) && isset($_POST['login'])) {
  if (login($_POST['toaster'], $_POST['oven']))
    
    header('Location: ./workspace.php');
  //else show error
}

//theyre registering
 if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
   
   //parse their info
   // ...
   
   //if register is successful, redirect them to their page
   if (register($_POST['username'],$_POST['email'],$_POST['password']))
     header( 'Location: ./workspace.php' ) ;
   //else show error
 }

include_once 'includes/header.php';
include_once 'includes/main.php';
include_once 'includes/footer_main.php';
?>
