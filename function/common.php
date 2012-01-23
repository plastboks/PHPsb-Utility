<?php

// haxify function for 1337ing of strings.
function haxify($string) {
  // setup return variable
  $return = '';

  // make a before and after replacement character list
  $before_hax = array("a", "e", "s", "o", "t", "l", "f", "y");
  $after_hax  = array("4", "3", "z", "0", "7", "!", "ph", "j");

  // loop trough the string
  for ( $i = 0; $i < strlen($string); $i++ ) {
    $char = $string[$i];

    // find characters and replace them
    if ( ($pos = array_search($char, $before_hax)) !== false ) {
      $char = $after_hax[$pos];
    }
    // insert them back into the string
    $return .= $char;
  }

  return $return;
}

function cryptMethods() {
  return array(
    'sha1',
    'sha256',
    'md5',
  );
}
