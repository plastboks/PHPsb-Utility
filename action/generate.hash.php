<?php

// function for generating sha1 hash, reason for this function is for the possibility of change later.
function sha1crypt($arg) {
  return hash('sha1',$arg);
}

// function for generating sha256 hash
function sha256crypt($arg) {
  return hash('sha256',$arg);
}

// function for generating md5 hash, the additional "$1$" is the prefix used to identify md5 hashes.
function md5crypt($argument){
  return hash('md5',$arg);
}

// function for generating des hash.
function descrypt($argument){
  $jumble = base64_encode(md5(rand(1,100000000)));
  $salt = substr($jumble,0,2);
  return crypt($argument, $salt);
}

$userinput = $_POST['userinput'];
$cryptmethod = $_POST['cryptmethod'];

if ( strlen($userinput) > 32 ) {
  die("Max 32 characters in input");
}

$methods = array(
  'sha1crypt',
  'sha256crypt',
  'md5crypt',
  'descrypt',
);

if (in_array($cryptmethod, $methods)) {
  echo $cryptmethod($userinput);
} else {
  die('Unsupported method');
}
