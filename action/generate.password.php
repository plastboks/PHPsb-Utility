<?php 

// function for randomizeing array.
function a_array_rand($input, $num_req) {
  // if nothing, do nothing.
  if (count($input) == 0) {
    return array(); 
  }
  // if nothing do nothing.
  if ($num_req < 1) { 
    return array(); 
  }
  // setupt return array.
  $out = array();
 
  // itterate trough the second argument, and array_rand.
  if ($num_req > count($input)) {
    for($i = 0; $i < $num_req; $i++) {
      $idx = array_rand($input, 1);
      $out[] = $input[$idx];
    }
  } else {
    $idxlist = array_rand($input, $num_req);
    if($num_req == 1) { $idxlist = array($idxlist); }
    for($i = 0; $i < count($idxlist); $i++) {
      $out[] = $input[$idxlist[$i]];
    }
  }
  return $out;
}

// generate pass
function generatepass($array) {
  $outarray = array();

  // this is the no somilar characthers
  if ( isset($array['nosimilar']) ) {
    $raw_lower = "a b c d e f g h k m n p q r s t u v w x y z";
    $raw_numbers = "2 3 4 5 6 7 8 9";
    $raw_symbols = "# $ % ^ & * ( ) _ - + = . , [ ] { } :";
  } else { // this is all the other charachters
    $raw_lower = "a b c d e f g h i j k l m n o p q r s t u v w x y z";
    $raw_numbers = "1 2 3 4 5 6 7 8 9 0";
    $raw_symbols= "# $ % ^ & * ( ) _ - + = . , [ ] { } : |";
  }

  // do some shuffeling of the characters
  $lowercase = explode(" ", $raw_lower);
  shuffle($lowercase);
  $uppercase = explode(" ", strtoupper($raw_lower));
  shuffle($uppercase);
  $numbers = explode(" ", $raw_numbers);
  shuffle($numbers);
  $symbols= explode(" ", $raw_symbols);
  shuffle($symbols);

  if ( $array['lowercase'] > 0 ) {
    $outarray = array_merge($outarray, a_array_rand($lowercase, $array['lowercase']));
  }
  if ( $array['uppercase'] > 0 ) {
    $outarray = array_merge($outarray, a_array_rand($uppercase, $array['uppercase']));
  }
  if ( $array['numbers'] > 0 ) {
    $outarray = array_merge($outarray, a_array_rand($numbers, $array['numbers']));
  }
  if ( $array['symbols'] > 0 ) {
    $outarray = array_merge($outarray, a_array_rand($symbols, $array['symbols']));
  }

  // if user has flagged the given order checkbox do not shuffle the string.
  if ( ! isset($array['givenorder']) ) {
    shuffle($outarray);
  }

  return implode('', $outarray);
}

// variables
$num_limit = 32; // equals the max password length.
$userdata = $_POST;

// santesizing
foreach(array('length', 'lowercase', 'uppercase', 'numbers', 'symbols') as $i) {
    if ( !is_numeric($userdata[$i]) ) {
      die("Only numbers as data");
    } else {
      $userdata[$i] = abs($userdata[$i] + 0); // if user has submitted negative values
    }
}

// test if userpassword characeter overceeds numlimit
if( $userdata['length'] > $num_limit ) {
  die("The length of your password exeeds 32 characters");
}

// test if userdata sum is over or under userpassword length
if ( (array_sum($userdata) - $userdata['length']) !== $userdata['length'] ) {
  die("Your data does not match the password length");
}

// echo password for ajax
echo generatepass($userdata);


