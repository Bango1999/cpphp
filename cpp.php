<?php
include "engine/functions.php";
include "engine/kony.php";

//if theyre logged in and theyre not coming from workspace, take them to workspace
/* $source = null;
if (isset($_SERVER['HTTP_REFERER']))
	$source = explode( '.',$_SERVER['HTTP_REFERER'])[3];
if (isset($_SESSION['user']) && $source != 'com/workspace' && $source != 'com/cpp')
  header( 'Location: ./workspace.php' ) ; */

//run their shitty code for them
if (isset($_POST['code'])) {
                      //code,            params,          file,         bash
  $out = codeRunner($_POST['code'], $_POST['params'], 'main.cpp', './bin/boop');
  $compiled = checkCompilation('bin/output');
  //if prog compiled, and its not gonna be the exact same encrypted string as the last one, store it
  if ($compiled && notLast()) {
    //code, database fieldname,   connection
    store($_POST['code'], 'code');
  }
}

include_once 'includes/header.php';
include_once 'includes/cpp_form.php';
include_once 'includes/footer.php';
?>