<?php

// function for base64 encode and decode
function mybase64($array) {
  
  if ( $array['method'] == "encode" ) {
    return base64_encode($array['userdata']);
  } elseif ( $array['method'] == "decode" ) {
    return base64_decode($array['userdata']);
  } else {
    die('This is not a method');
  }
  
}


// setup array for base64 function 
$array = array();

// setup userdata and method variables sendt trough post
$array['userdata'] = filter_var($_POST['input']);
$array['method'] = filter_var($_POST['method']);

// echo result for ajax
echo mybase64($array);


