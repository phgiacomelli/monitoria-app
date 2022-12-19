<?php
require_once("../../../vendor/autoload.php");


use models\Monitor;
use models\Monitoria;

$test = json_encode($_POST);
$decode = json_decode($test);

$data = $decode->dados->data;
$start = $decode->dados->start;
$end = $decode->dados->end;
$subject = $decode->dados->subject;
$class = $decode->dados->class;

$monitorias = Monitoria::findAll();

$msg;
if (count($monitorias) > 0) {
  foreach ($monitorias as $monitoria) {
    if ($monitoria->getData() == $data) {
      if (strtolower($monitoria->getSala()) == strtolower($class)) {
        if (
          ($start >= date("H:i", strtotime($monitoria->getHorarioInicio())) && $start <= date("H:i", strtotime($monitoria->getHorarioFim()))) ||
          ($end >= date("H:i", strtotime($monitoria->getHorarioInicio())) && $end <= date("H:i", strtotime($monitoria->getHorarioFim())))
        ) {
          $msg = 'Já existe uma monitoria nesta mesma sala e horário';
          header('HTTP/1.1 500 Internal Server Booboo');
          header('Content-Type: application/json; charset=UTF-8');
          die(json_encode(array('message' => $msg, 'code' => 1337)));
          
        } else {
          $msg = '';
        }
      } else {
        $msg = '';
      }
    } else {
      $msg = '';
    }
  }
} else {
  $msg = '';
}



if (isset($msg)) {
  $monitor = Monitor::findBySubject($subject);

  if (gettype($monitor) != 'string') {
    $monitoria = new Monitoria(
      $monitor->getId(),
      $subject,
      $start,
      $data,
      $end,
      strtoupper($class),
    );
    $saved = $monitoria->save();
    if ($saved) {
      $msg = "Monitroria salva com sucesso";

      header('Content-Type: application/json');
      print json_encode(array('message' => $msg));
    } else {
      $msg = 'Ocorreu um erro ao tentar salvar a monitoria';

      header('HTTP/1.1 500 Internal Server Booboo');
      header('Content-Type: application/json; charset=UTF-8');
      die(json_encode(array('message' => $msg, 'code' => 1337)));
    }
  } else {
    $msg = 'Nenhum monitor cadastrado na matéria';

    header('HTTP/1.1 500 Internal Server Booboo');
    header('Content-Type: application/json; charset=UTF-8');
    die(json_encode(array('message' => $msg, 'code' => 1337)));
  }
} else {
  header('HTTP/1.1 500 Internal Server Booboo');
  header('Content-Type: application/json; charset=UTF-8');
  die(json_encode(array('message' => $msg, 'code' => 1337)));
}

// if ($isValid) {
//   header('Content-Type: application/json');
//   print json_encode(array('message'=>'Monitoria salva com sucesso'));
// } else{
//   header('HTTP/1.1 500 Internal Server Booboo');
//   header('Content-Type: application/json; charset=UTF-8');
//   die(json_encode(array('message' => 'Ocorreu um erro ao tentar criar uma monitoria', 'code' => 1337)));
// }




    // if (isset($_POST['cadTutoring'])) {
    //   // var_dump($_POST);
      
    //   $isValid = false;
    //   if (count($monitorias) > 0) {
    //     foreach ($monitorias as $monitoria) {
    //       if ($monitoria->getData() == $_POST['date'] ) {
    //         if (strtolower($monitoria->getSala()) == strtolower($_POST['sala'])) {
    //           if (
    //                 ($_POST['start'] >= date("H:i",strtotime($monitoria->getHorarioInicio())) && $_POST['start'] <= date("H:i",strtotime($monitoria->getHorarioFim()))) ||
    //                 ($_POST['end'] >= date("H:i",strtotime($monitoria->getHorarioInicio())) && $_POST['end'] <= date("H:i",strtotime($monitoria->getHorarioFim())))
    //             ) {
    //               $isValid = false;
    //           } else{
    //             $isValid = true;
    //           }
    //         } else{
    //           $isValid = true;
    //         }
    //       } else{
    //         $isValid = true;
    //       }      
    //     }  
    //   } else{
    //     $isValid = true;
    //   }
      

    //   if ($isValid) {
    //     $monitor = Monitor::findBySubject($_POST['idMateria']);

    //     // var_dump($monitor);
    //     if (gettype($monitor) != 'string') {
    //       $monitoria = new Monitoria(
    //         $monitor->getId(),
    //         $_POST['idMateria'],
    //         $_POST['start'],
    //         $_POST['date'],
    //         $_POST['end'],
    //         strtoupper($_POST['sala']),
    //       );
    //       $monitoria->save();
    //       header('Location: index.php');
    //     }else{
    //       echo "toastr.error('You clicked Error Toast')";
    //       header('Location: index.php');
    //     }
    //   }

  
    // }