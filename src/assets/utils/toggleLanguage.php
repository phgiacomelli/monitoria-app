<?php
  session_start();

  if (isset($_POST['selectLang'])) {
    $langSelected = $_POST['lang'];
    $_SESSION['language'] = $langSelected;
  }

  if (isset($_POST['loginToggleLanguage'])) {
    if ($_SESSION['language'] == 'ptbr') {
      $_SESSION['language'] = 'en';
    } else{
      $_SESSION['language'] = 'ptbr';
    }
  }
  header('Location: ../../components/home');
  
