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
  $jumble = md5(rand(1,100000000));
  $salt = substr($jumble,0,8);
  $return = crypt($argument, '$1$' . $salt);
  return $return;
}

// function for base64 encode, reason for this function is for the possibility of change later.
function base64crypt($arg){
  return base64_encode($arg);
}

// function for generating des hash.
function descrypt($argument){
  $jumble = base64_encode(md5(rand(1,100000000)));
  $salt = substr($jumble,0,2);
  return crypt($argument, $salt);
}

// receive user input, santesize them and put them into variables.
$userinput = filter_var($_POST['userinput']);
$cryptmethod = filter_var($_POST['cryptmethod']);

// do not accept iserinput of more than 32 characters
if ( strlen($userinput) > 32 ) {
  die("Max 32 characters in input");
}

// do some more checking of userinput. (never trust your users).
switch ($cryptmethod) {
  case "sha1crypt":
    $genhash = "sha1crypt";
    break;
  case "sha256crypt":
    $genhash = "sha256crypt";
    break;
  case "md5crypt":
    $genhash = "md5crypt";
    break;
  case "base64crypt":
    $genhash = "base64crypt";
    break;
  case "descrypt":
    $genhash = "descrypt";
    break;
  default:
   die("This is not a supported function");
}

// run the function
$generatedhash = $genhash($userinput);


// echo result for ajax
echo $generatedhash;


