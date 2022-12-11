<?php
  session_start();
  $json_ptbr = file_get_contents(__DIR__."\\pt-BR.json");
  $json_en = file_get_contents(__DIR__."\\en.json");

  if (isset($_SESSION['language'])) {
    if ($_SESSION['language'] == 'ptbr') {
      $translate = json_decode($json_ptbr);    
    }else{
      $translate = json_decode($json_en);
    }
  } 