
<?php

use models\Curso;
use db\MySQL;

require_once('../../../vendor/autoload.php');

  // $cursos = Curso::findall();
  $cursos = Curso::findall();
  $conexao = new MySQL();
  $sql = "SELECT * FROM curso";
  $resultados = $conexao->consulta($sql);

  $teste = array();
  foreach ($cursos as $curso) {
    var_dump($curso);
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../reset.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../../../globalStyles.css">

  <title>Monitoria-app | Register</title>
</head>

<body>
  <div class="container">
    <div class="form-container">
      <div class="form-img"></div>
      <div class="form-content">
        <div class="form-header">
          <h1>Crie sua conta no <br><span>MONITORIA-APP!</span></h1>
        </div>
        <form action="./cadUsuario.php" method="post">
          <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="tel">Telefone</label>
            <input type="tel" name="tel" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="curso">Curso</label>
            <!-- <input type="password" name="curso"> -->
            <select name="curso" >
              <?php
                foreach ($cursos as $curso) {
                  echo "<option value='{$curso['id']}'>{$curso['nome']}</option>";
                }
              ?> 
              <option value=""></option>
            </select>
          </div>
          <div class="form-group">
            <label for="pwd">Senha</label>
            <input type="password" name="pwd">
          </div>
          <!-- <div class="form-register">
            <p>Não tem uma conta?<a href="../register/index.html">Registre-se!</a></p>
          </div> -->
          <input type="submit" name="submit" value="Registrar">
        </form>
      </div>
    </div>
  </div>


  <!-- <img src="../assets/imgs/Webinar-amico.svg" alt=""> -->
</body>

</html>