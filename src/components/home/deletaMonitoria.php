<?php

use models\Monitoria;
require_once("../../../vendor/autoload.php");

  session_start();
  if (isset($_POST['deleteTutoring'])) {
    $idMonitoria = $_POST['idMonitoria'];

    //Primeiro pegamos todas as monitorias que o usuario marcou presença
    $monitoria = Monitoria::find($idMonitoria);
    $monitoria->delete();
    // var_dump($idMonitoria);
  }
  header('Location: ./index.php');
