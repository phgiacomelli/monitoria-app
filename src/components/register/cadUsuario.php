<?php
namespace register;
use models\Usuario;

if (isset($_POST['submit'])) {
  //  require_once __DIR__."/vendor/autoload.php";
  require_once('../../../vendor/autoload.php');
  
  // var_dump($_POST);
  $u = new Usuario(
    $_POST['email'],
    $_POST['pwd'],
  );
  $u->setNome($_POST['name']);
  $u->setContato($_POST['tel']);
  $u->setTipo('aluno');
  $u->setIdCurso(10);
  
  $u->save();
  header("location: ../login/index.html");
}else{
  return;
}


?>
