<?php

use models\Curso;
use db\MySQL;

require_once('../../../vendor/autoload.php');
require_once("../../translate/translate-service.php");

$cursos = Curso::findall();

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
          <!-- <h1>Crie sua conta no <br><span>MONITORIA-APP!</span></h1> -->
          <?php
          $h1 = "<h1>{$translate->registerTitle} <br><span>MONITORIA-APP!</span></h1>";
          echo $h1;
          ?>
        </div>
        <form action="./cadUsuario.php" method="post">
          <div class="form-group">
            <?php
            echo  "<label for='name'>{$translate->lblName}</label>
                   <input type='text' name='name' autocomplete='off' placeholder='{$translate->placeholderName}'>";
            ?>

          </div>
          <div class="form-group">
            <?php
            echo  "<label for='tel'>{$translate->lblTel}</label>
                     <input type='tel' name='tel' autocomplete='off' placeholder='{$translate->placeholderTel}'>";
            ?>

          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <?php
            echo  "<input type='email' name='email' autocomplete='off' placeholder='{$translate->placeholderEmail}'>";
            ?>

          </div>
          <div class="form-select" id="select">
            <?php
            echo  "<label for='curso'>{$translate->lblCourse}</label>";
            ?>
            <select name="curso">
              <?php
              echo "<option value='default' selected disabled>{$translate->placeholderCourse}</option>";
              foreach ($cursos as $curso) {
                echo "<option value='{$curso->getId()}'>{$curso->getNome()}</option>";
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <?php
            echo  "<label for='pwd'>{$translate->lblPwd}</label>
                   <input type='password' name='pwd' placeholder='{$translate->placeholderPwd}'>";
            ?>
            
          </div>
          <?php
            echo "<input type='submit' name='submit' value='{$translate->registerBtn}'>";
          ?>
          
        </form>
      </div>
    </div>
  </div>
</body>

</html>