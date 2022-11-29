<?php
  require_once("../../assets/utils/generateAdmin.php");
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

  <title>Monitoria-app | Login</title>
</head>

<body>
  <div class="container">
    <div class="form-container">
      <div class="form-img"></div>
      <div class="form-content">
        <div class="form-header">
          <h1>Bem vindo ao <br><span>MONITORIA-APP!</span></h1>
          <!-- <p>Acesse para bnla bla bla</p> -->
        </div>
        <form action="login.php" method="post">
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="pwd">Senha</label>
            <input type="password" name="pwd">
          </div>
          <div class="form-register">
            <p>Não tem uma conta?<a href="../register/">Registre-se!</a></p>
          </div>
          <input type="hidden" name="">
          <input type="submit" name="login" value="Entrar">
        </form>
      </div>
    </div>
  </div>


  <!-- <img src="../assets/imgs/Webinar-amico.svg" alt=""> -->
</body>

</html>