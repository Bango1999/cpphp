<?php
include "engine/functions.php";
include "engine/kony.php";

if (!isset($_SESSION['user']))
  header( 'Location: ./cpp.php' ) ;

if (isset($_POST['code'])) {
                      //code,            params,          file,         bash
  $out = codeRunner($_POST['code'], $_POST['params'], 'bin/'. $_SESSION['user']['id'] .'.cpp', 'bin/boop');
  $compiled = checkCompilation('bin/output');
  //if prog compiled, store it
  if ($compiled) {
    //code, database fieldname
    store($_POST['code'], 'code');
  }
}

include_once 'includes/header.php';
include_once 'includes/cpp_user.php';
include_once 'includes/footer.php';
?>