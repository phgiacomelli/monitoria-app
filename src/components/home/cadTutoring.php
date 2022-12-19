<?php
require_once("../../../vendor/autoload.php");

use models\Monitor;
use models\Monitoria;

    if (isset($_POST['cadTutoring'])) {
      // var_dump($_POST);
      $monitorias = Monitoria::findAll();
      
      $isValid = false;
      if (count($monitorias) > 0) {
        foreach ($monitorias as $monitoria) {
          if ($monitoria->getData() == $_POST['date'] ) {
            if (strtolower($monitoria->getSala()) == strtolower($_POST['sala'])) {
              if (
                    ($_POST['start'] >= date("H:i",strtotime($monitoria->getHorarioInicio())) && $_POST['start'] <= date("H:i",strtotime($monitoria->getHorarioFim()))) ||
                    ($_POST['end'] >= date("H:i",strtotime($monitoria->getHorarioInicio())) && $_POST['end'] <= date("H:i",strtotime($monitoria->getHorarioFim())))
                ) {
                  $isValid = false;
              } else{
                $isValid = true;
              }
            } else{
              $isValid = true;
            }
          } else{
            $isValid = true;
          }      
        }  
      } else{
        $isValid = true;
      }
      

      if ($isValid) {
        $monitor = Monitor::findBySubject($_POST['idMateria']);

        // var_dump($monitor);
        if (gettype($monitor) != 'string') {
          $monitoria = new Monitoria(
            $monitor->getId(),
            $_POST['idMateria'],
            $_POST['start'],
            $_POST['date'],
            $_POST['end'],
            strtoupper($_POST['sala']),
          );
          $monitoria->save();
          header('Location: index.php');
        }else{
          var_dump('aa');
        }
      }

  
    }