<?php
if (!isset($_SESSION['idUsuario'])) {
  session_start();
}

$json_ptbr = file_get_contents(__DIR__ . "\\pt-BR.json");
$json_en = file_get_contents(__DIR__ . "\\en.json");

$lang = $_SESSION['language'];

if (isset($lang)) {
  if ($lang == 'ptbr') {
    $translate = json_decode($json_ptbr);
  } else {
    $translate = json_decode($json_en);
  }
}
