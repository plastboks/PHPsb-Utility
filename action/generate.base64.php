<?php

$data = $_POST['input'];

if ($_POST['method'] == 'encode') {
  echo base64_encode($data);
} else {
  echo base64_decode($data);
}
