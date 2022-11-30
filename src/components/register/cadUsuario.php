<?php
namespace register;
use models\Usuario;

if (isset($_POST['submit'])) {
  require_once('../../../vendor/autoload.php');
  
  $u = new Usuario(
    $_POST['email'],
    $_POST['pwd'],
  );
  $u->setNome($_POST['name']);
  $u->setContato($_POST['tel']);
  $u->setTipo('aluno');
  $u->setIdCurso($_POST['curso']);
  
  $u->save();
  header("location: ../login/index.php");
}else{
  return;
}
