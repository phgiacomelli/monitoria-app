<?php
require_once("../../../vendor/autoload.php");

use models\Monitor;

  $monitores = Monitor::findall();
  if (isset($_POST['cadTutor'])) {
    if (isset($_POST['aluno']) && isset($_POST['materia'])) {
      foreach ($monitores as $monitor) {
        if ($_POST['materia'] != $monitor->getIdMateria()) {
          $novoMonitor = new Monitor(
            $_POST['aluno'],
            $_POST['materia']
          );
          $novoMonitor->save();
        }
      }
    }
  }
  header('Location: ./index.php');

?>