<?php

use models\PresencaMonitoria;
require_once("../../../vendor/autoload.php");

  session_start();
  if (isset($_POST['confirmaPresena'])) {
    $idUser = $_SESSION['idUsuario'];
    $idMonitoria = $_POST['idMonitoria'];

    //Primeiro pegamos todas as monitorias que o usuario marcou presença
    $presencasConfirmadas = PresencaMonitoria::findAllByUsuario($idUser);
    var_dump($presencasConfirmadas);
    //Agora verificamos se ele já confirmou presença nesta monitoria
    if (count($presencasConfirmadas)>0) {
      foreach ($presencasConfirmadas as $confirmada) {
        $idConfirmada = $confirmada->getIdMonitoria();
        if ($idConfirmada != $idMonitoria){
          $presenca = new PresencaMonitoria(
            $idUser,
            $idMonitoria
          );

          var_dump($presenca);
          // $presenca->save();    
        }
      }      
    } else{
      $presenca = new PresencaMonitoria(
        $idUser,
        $idMonitoria
      );

      var_dump($presenca->getCompareceu());
      $presenca->save();    
    }
    
  }
  header('Location: ./index.php');
