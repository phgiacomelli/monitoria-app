<?php
  require_once("../../assets/utils/generateAdmin.php");
  require_once("../../translate/translate-service.php");
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

  <title>Monitoria-app | Login</title>
</head>

<body>
  <div class="container">
    <div class="lang">
      <form action="../../assets/utils/toggleLanguage.php" method="post">
        <button style="border:none; background-color:transparent;" type="submit" name="loginToggleLanguage">
          <span class="material-symbols-outlined" id="openLangMenu">language</span>
        </button>
      </form>
    </div>
    <div class="form-container">
      <div class="form-img"></div>
      <div class="form-content">
        <div class="form-header">
          <?php
            $h1 ="<h1>{$translate->welcome} <br><span>MONITORIA-APP!</span></h1>";
            echo $h1;
          ?>
          
          <!-- <p>Acesse para bnla bla bla</p> -->
        </div>
        <form action="login.php" method="post">
          <div class="form-group">
            <label for="email">E-mail</label>
            <?php
              echo "<input type='email' name='email' autocomplete='off' placeholder='{$translate->placeholderEmail}'>";
            ?>
          </div>
          <div class="form-group">
            <?php
              echo "<label for='pwd'>{$translate->lblPwd}</label>
                    <input type='password' name='pwd' placeholder='{$translate->placeholderPwd}'>";
            ?>
            <!-- <label for="pwd">Senha</label> -->
            
          </div>
          <div class="form-register">
            <?php
              $p = "<p>{$translate->registerText}<a href='../register/'>{$translate->registerLink}</a></p>";
              echo $p;
            ?>
            <!-- <p>Não tem uma conta?<a href="../register/">Registre-se!</a></p> -->
          </div>
          <?php
            $input = "<input type='submit' name='login' value='{$translate->loginBtn}'>";
            echo $input;
          ?>
          <!-- <input type="submit" name="login" value="Entrar"> -->
        </form>
      </div>
    </div>
  </div>
  <script>
  
  </script>

</body>

</html>