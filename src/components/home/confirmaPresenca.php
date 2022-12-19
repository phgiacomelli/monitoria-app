<?php
require_once("../../../vendor/autoload.php");

use models\PresencaMonitoria;

  if (isset($_POST['confirmaPresenca'])) {
    $presenca = PresencaMonitoria::find($_POST['idPresence']);
    var_dump($presenca);
    $presenca->setCompareceu("Sim");
    $presenca->save();
    header('Location: ./index.php');
  }

?>