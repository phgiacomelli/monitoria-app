<?php

use models\Usuario;

  require_once('../../../vendor/autoload.php');

  $admin = Usuario::getAdmin();

  if (!isset($admin)) {
    $u = new Usuario(
      "admin@email.com",
      "$@pqfe#777",
    );
    $u->setNome('admin');
    $u->setContato('51999999999');
    $u->setTipo('admin');
    $u->setIdCurso(3);
    $u->save();
  }