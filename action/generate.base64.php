<?php

$data = $_POST['input'];

if ($_POST['method'] == 'encode') {
  echo chunk_split(base64_encode($data),45);
} else {
  echo base64_decode($data);
}
