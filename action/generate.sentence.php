<?php

// include common functions.
include_once('../function/common.php');

// function for generating sentances from library files.
//function sentencephrase( $wc, $cap, $hax, $nospace ) {

function sentencephrase($array) {
  // setup result variable
  $result = '';

  // wordlist files
  $verbs = file("../lib/verbs");
  $nouns = file("../lib/nouns");
  $adverbs = file("../lib/adverbs");
  $pronouns = file("../lib/pronouns");
  $adjectives = file("../lib/adjectives");
  $prepositions = file("../lib/prepositions");
  
  // get total from wordlistfiles
  $total_verbs = count($verbs) -1;
  $total_nouns = count($nouns) -1;
  $total_adverbs = count($adverbs) -1;
  $total_pronouns = count($pronouns) -1;
  $total_adjectives = count($adjectives) -1;
  $total_prepositions = count($prepositions) -1;

  // random word
  $random_verb = trim($verbs[rand(0, $total_verbs)]);
  $random_noun = trim($nouns[rand(0, $total_nouns)]);
  $random_adverb = trim($adverbs[rand(0, $total_adverbs)]);
  $random_pronoun = trim($pronouns[rand(0, $total_pronouns)]);
  $random_adjective = ($array['capitalize'] == false) ? trim($adjectives[rand(0, $total_adjectives)]) : trim(ucfirst($adjectives[rand(0, $total_adjectives)]));
  $random_preposition = trim($prepositions[rand(0, $total_prepositions)]);

  // select how many words
  switch( $array['wordcount'] ) {
    case 3:
      $result = $random_adjective . " " . $random_pronoun . " " . $random_adverb;
      break;
    case 4:
      $result = $random_adjective . " " . $random_pronoun . " " . $random_adverb . " " . $random_verb;
      break;
    case 5:
      $result = $random_adjective . " " . $random_pronoun . " " . $random_adverb . " " . $random_verb . " " . $random_noun;
      break;
  }
 
  // spaces or not 
  if ( $array['nospace'] ) {
    $result = str_replace(' ', '', $result);
  }

  // haxiy or not
  if ( $array['hax'] ) {
    $result = haxify($result);
  }
 
  return $result;

}


// setup array for sentencephrase function
$array = array();

// check how many words should be generated
if ( isset($_POST['i']) ) {
  $array['wordcount'] = filter_var($_POST['i']);
} else {
  $array['wordcount'] = 3;
}

// check if first letter in first word should be capitalized
if ( isset($_POST['capitalize']) ) {
  $array['capitalize'] = 1;
} else {
  $array['capitalize'] = 0;
}

// check if sentence is to be haxified
if ( isset($_POST['hax']) ) {
  $array['hax'] = 1;
} else {
  $array['hax'] = 0;
}

// check if sentance should be with or without spaces
if ( isset($_POST['space']) ) {
  $array['nospace'] = 1;
} else {
  $array['nospace'] = 0;
}

// check to see if user tries to generate to many or to few words
if ( $array['wordcount'] > 5) {
 die("To many words");
} elseif ( $array['wordcount'] < 3 ) {
 die("To few words");
} else {
  // echo sentence for ajax
  echo sentencephrase($array);
}

