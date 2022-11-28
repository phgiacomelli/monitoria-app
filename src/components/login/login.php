<?php
namespace login;

use models\Usuario;


if(isset($_POST['login'])){
  require_once('../../../vendor/autoload.php');

  $u = new Usuario($_POST['email'], $_POST['pwd']);

  if ($u->authenticate()) {

    header("Location: ../home");
    // var_dump($u->authenticate());
  }

}



?>