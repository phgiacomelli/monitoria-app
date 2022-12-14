<?php
  session_start();

  if (isset($_POST['selectLang'])) {
    $langSelected = $_POST['lang'];
    $_SESSION['language'] = $langSelected;
  }
  
  header('Location: ../../components/home');
  
