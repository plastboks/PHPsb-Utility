<?php

require_once('../function/common.php');

$userinput = $_POST['userinput'];

if ( strlen($userinput) > 32 ) {
  die("Max 32 characters in input");
}

$cryptmethod = $_POST['cryptmethod'];

if (in_array($cryptmethod, cryptMethods())) {
  echo hash($cryptmethod, $userinput);
} else {
  die('Unsupported method');
}
