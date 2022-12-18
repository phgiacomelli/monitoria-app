<?php
require_once("../../../vendor/autoload.php");
use models\Usuario;

  if (isset($_POST['cadTeacher'])) {
    $t = new Usuario(
      $_POST['email'],
      '1234'
    );

    $t->setNome($_POST['name']);
    $t->setContato($_POST['tel']);
    $t->setTipo('professor');
    $t->save();
  }


?>