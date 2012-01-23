<?php 

// include general functions
include_once('../function/common.php');

// function for passphrase generation.
function passphrase($array) {
  // output
  $output = NULL;

  // inputfile
  $file = file($array['file']);

  // outputfile
  $s_output = NULL;

  // get total words in inputfile
  $tw = array_pop(array_keys($file));

  // get random word x number of times
  for($i=1; $i<=$array['i']; $i++) {
    // random
    $s_tmp = rand(0, $tw);
    // get the word
    $s_tmp = $file[$s_tmp];
    // uppercase
    if ($array['capitalize'] == true) {
      $s_tmp = ucfirst($s_tmp);
    }
    // trim
    $s_tmp = trim($s_tmp);

    $output[] = $s_tmp;
  }

  if ($array['extra'] == true) {
    $digitString = '';

    for($i=1; $i<=$array['extra']; $i++) {
      $d_tmp = rand(0, 9);
      $digitString .= $d_tmp;
    }

    $output[] = $digitString;
  }

  $glue = '';

  if ($array['spaces']) {
    $glue = ' ';
  }

  $outString = implode($glue,$output);

  return ($array['hax'])?haxify($outString):$outString;
}

// setup array for passphrase function 
$array = array();

// set wordlist
$array['file'] = "../lib/wordlist";

// get post data

// itterations
if ( isset($_POST['i']) ) {
  $array['i'] = filter_var($_POST['i']);
}
// trailing digits
if ( isset($_POST['digits']) ) {
  $array['extra'] = filter_var($_POST['digits']);
}
// capitalize
if ( isset($_POST['capitalize']) ){
  $array['capitalize'] = 1;
}
// leetify
if ( isset($_POST['hax']) ) {
  $array['hax'] = 1;
}
// spacify
if ( isset($_POST['spaces']) ) {
  $array['spaces'] = true;
}

// check if wordcount is lower than 1 and higher than 5
if ( $array['i'] == 0 ) {
  die("number is to low");
} elseif ( $array['i'] > 5 ) {
  die("number is to high");
} else {
  // echo result for ajax
  echo passphrase($array);
}

