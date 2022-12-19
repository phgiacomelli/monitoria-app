<?php

use models\Curso;
use models\Materia;
use models\Monitor;
use models\Monitoria;
use models\PresencaMonitoria;
use models\Usuario;

require_once('../../../vendor/autoload.php');
require_once("../../assets/utils/restrita.php");
require_once("../../translate/translate-service.php");

$monitorias = Monitoria::findAll();
$presencas = PresencaMonitoria::findAllByUsuario($_SESSION['idUsuario']);
$cursos = Curso::findall();
$monitores = Monitor::findall();
$materias = Materia::findall();
// var_dump($materias);

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../reset.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../../../globalStyles.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

  <title>Monitoria-app | Home</title>
</head>

<body>
  <div class="container">
    <div class="header">
      <div class="logo">
        <svg id="open-menu" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
          <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path>
        </svg>
        <h1>Monitoria-app</h1>
      </div>
      <div class="user-opt">
        <!-- <p>Paulo</p> -->
        <p>
          <?php
          echo $_SESSION['nome'];
          ?>
        </p>

        <svg id="user-logo" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
          <path d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z">
          </path>
        </svg>

        <div class="opt-account">
          <ul>
            <li>
              <a href="#">
                <?php
                echo $translate->myAccount;
                ?>
              </a>
            </li>
            <li>
              <a href="../../assets/utils/logout.php">
                <?php
                echo $translate->logout;
                ?>
              </a>
            </li>
          </ul>
        </div>
        <div class="lang">
          <span class="material-symbols-outlined" id="openLangMenu">language</span>
        </div>
        <div class="lang-opt">
          <ul>
            <li>
              <form action="../../assets/utils/toggleLanguage.php" method="post">
                <input type="hidden" value="en" name="lang">
                <input type="submit" value="en" name="selectLang">
              </form>
            </li>
            <li>
              <form action="../../assets/utils/toggleLanguage.php" method="post">
                <input type="hidden" value="ptbr" name="lang">
                <input type="submit" value="pt-BR" name="selectLang">
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="menu-bar">
      <div class="menu-opt">
        <div class="menu-opt-content">
          <ul class="menu-opt-list">
            <li>
              <a href="#" class="view-monitorias" title="Visualizar monitorias">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                  <path d="M19.893 3.001H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h15.893c1.103 0 2-.897 2-2V5a2.003 2.003 0 0 0-2-1.999zM8 19.001H4V8h4v11.001zm6 0h-4V8h4v11.001zm2 0V8h3.893l.001 11.001H16z"></path>
                </svg>
                <p class="opt-text">
                  <?php
                  echo $translate->menuTutoringTitle;
                  ?>
                </p>
              </a>
            </li>
            <!-- <li>
              <a href="#" title="Candidatar-se à monitor">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                  <path d="M20 6h-3V4c0-1.103-.897-2-2-2H9c-1.103 0-2 .897-2 2v2H4c-1.103 0-2 .897-2 2v11c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V8c0-1.103-.897-2-2-2zm-5-2v2H9V4h6zM8 8h12v3H4V8h4zM4 19v-6h6v2h4v-2h6l.001 6H4z"></path>
                </svg>
                <p class="opt-text">
                  Candidatar-se à monitor
                </p>
              </a>
            </li> -->
            <?php
            $features = "";
            $menuStudentRegistration = $translate->menuStudentRegistration;
            $menuTeacherRegistration = $translate->menuTeacherRegistration;
            if ($_SESSION['tipo'] == 'admin') {

              $features = "
              <li>
                <a href='#' class='view-cadStudent' title='Cadastro de Aluno'>
                <svg xmlns='http://www.w3.org/2000/svg' width='28' height='28' viewBox='0 0 24 24' style='transform: ;msFilter:;'><path d='M9.715 12c1.151 0 2-.849 2-2s-.849-2-2-2-2 .849-2 2 .848 2 2 2z'></path><path d='M20 4H4c-1.103 0-2 .841-2 1.875v12.25C2 19.159 2.897 20 4 20h16c1.103 0 2-.841 2-1.875V5.875C22 4.841 21.103 4 20 4zm0 14-16-.011V6l16 .011V18z'></path><path d='M14 9h4v2h-4zm1 4h3v2h-3zm-1.57 2.536c0-1.374-1.676-2.786-3.715-2.786S6 14.162 6 15.536V16h7.43v-.464z'></path></svg>
                
                  <p class='opt-text'>
                    {$menuStudentRegistration}
                  </p>
                </a>
              </li>
              <li>
                <a href='#' class='view-cadTeacher' title='Cadastro de Professor'>
                <svg xmlns='http://www.w3.org/2000/svg' width='28' height='28' viewBox='0 0 24 24' style='transform: ;msFilter:;'><path d='M9.715 12c1.151 0 2-.849 2-2s-.849-2-2-2-2 .849-2 2 .848 2 2 2z'></path><path d='M20 4H4c-1.103 0-2 .841-2 1.875v12.25C2 19.159 2.897 20 4 20h16c1.103 0 2-.841 2-1.875V5.875C22 4.841 21.103 4 20 4zm0 14-16-.011V6l16 .011V18z'></path><path d='M14 9h4v2h-4zm1 4h3v2h-3zm-1.57 2.536c0-1.374-1.676-2.786-3.715-2.786S6 14.162 6 15.536V16h7.43v-.464z'></path></svg>
                
                  <p class='opt-text'>
                    {$menuTeacherRegistration}
                  </p>
                </a>
              </li>
              ";
            }

            if ($_SESSION['tipo'] == 'professor') {
              $menuTutoringRegistration = $translate->menuTutoringRegistration;
              $features = "
              <li>
                <a href='#' class='view-cadTutoring' title='Cadastrar monitoria'>
                <svg xmlns='http://www.w3.org/2000/svg' width='28' height='28' viewBox='0 0 24 24' style='transform: ;msFilter:;'><path d='M3 8v11c0 2.201 1.794 3 3 3h15v-2H6.012C5.55 19.988 5 19.806 5 19c0-.101.009-.191.024-.273.112-.576.584-.717.988-.727H21V4c0-1.103-.897-2-2-2H6c-1.206 0-3 .799-3 3v3zm3-4h13v12H5V5c0-.806.55-.988 1-1z'></path><path d='M11 14h2v-3h3V9h-3V6h-2v3H8v2h3z'></path></svg>
                  <p class='opt-text'>
                    {$menuTutoringRegistration}
                  </p>
                </a>
              </li>";
            }

            echo $features;
            ?>

          </ul>
        </div>
      </div>
    </div>

    <div class="main-content">

      <div class="monitorias-container" data-hidden="true">
        <div class="title">
          <h1>
            <?php
            echo $translate->tutoringList;
            ?>
          </h1>
        </div>

        <div class="monitorias-list">
          <?php
          if (count($monitorias) > 0) {
            foreach ($monitorias as $monitoria) {
              $monitoriaId = $monitoria->getId();
              $materia = Materia::find($monitoria->getIdMateria());
              $horaInicio = strtotime($monitoria->getHorarioInicio());
              $horaInicioF = date("H:i", $horaInicio);
              $horaFinal = strtotime($monitoria->getHorarioFim());
              $horaFinalF = date("H:i", $horaFinal);
              $monitor = Monitor::find($monitoria->getIdMonitor());
              $userMonitor = Usuario::find($monitor->getIdUsuario());
              $nomeMonitor = $userMonitor->getNome();
  
              $confirmou = false;
              foreach ($presencas as $presenca) {
                if ($presenca->getIdMonitoria() == $monitoriaId) {
                  $confirmou = true;
                }
              }
              $btn = "
                <div class='monitoria-btn'>
                  <a href='#presencaMonitoria{$monitoriaId}' rel='modal:open'>
                    <p>{$translate->presenceBtn}</p>
                  </a>
                </div>
              ";
  
              if ($confirmou) {
                $btn = "
                  <div class='monitoria-btn attend'>
                    <a>
                      <p>
                        {$translate->confirmedPresence}
                      </p>
                    </a>
                  </div>
              ";
              }
  
              if ($_SESSION['tipo'] != 'aluno')
                $btn = "
                <div class='monitoria-btn'>
                  <a href='#deleteMonitoria{$monitoriaId}' rel='modal:open'>
                    <p>{$translate->deleteTutoring}</p>
                  </a>
                </div>";
  
              $template =
                "<div class='monitoria'>
                <div class='monitoria-header'>
                  <h2>{$materia->getNome()}</h2>
                </div>
                <div class='monitoria-content'>
                  <p class='monitoria-date'>📆 {$monitoria->getData()}</p>
                  <div class='monitoria-hours'>
                    <p>
                      🕐 {$horaInicioF} - {$horaFinalF}
                    </p>
                  </div>
                  <div class='monitoria-class'>
                    <p>
                      📌 {$monitoria->getSala()}
                    </p>
                  </div>
                  <div class='monitoria-mentor'>
                    <p>
                      🎓 {$nomeMonitor}
                    </p>
                  </div>
                </div>
                
                {$btn}
              </div>
              
              <div id='presencaMonitoria{$monitoriaId}' class='modal'>
                <h1 class='modal-title'>{$translate->questPresence}</h1>
                <div class='modal-btns'>
                  <div class='confirm'>
                    <form action='marcaPresenca.php' method='post'>
                      <input type='hidden' name='idMonitoria' value='{$monitoriaId}'>
                      <input type='submit' name='confirmaPresena' value='{$translate->yesBtn}' >
                    </form>
                  </div>
                  <div class='cancel'>
                    
                      <a href='#' rel='modal:close'>{$translate->noBtn}</a>
                    
                  </div>
                </div>
              </div>
  
              <div id='deleteMonitoria{$monitoriaId}' class='modal'>
                <h1 class='modal-title'>{$translate->questDelete}</h1>
                <div class='modal-btns'>
                  <div class='confirm'>
                    <form action='deletaMonitoria.php' method='post'>
                      <input type='hidden' name='idMonitoria' value='{$monitoriaId}'>
                      <input type='submit' name='deleteTutoring' value='{$translate->yesBtn}' >
                    </form>
                  </div>
                  <div class='cancel'>
                      <a href='#' rel='modal:close'>{$translate->noBtn}</a>
                  </div>
                </div>
              </div>
              ";
              echo $template;
            }
          } else{
            echo "<h2 class='not-found'>{$translate->notFoundTutoring}</h2>";
          }
          ?>
        </div>
      </div>

      <div class="cadStudent-container" data-hidden="true">
        <div class="title">
          <h1>
            <?php
            echo $translate->menuStudentRegistration;
            ?>
          </h1>
        </div>

        <div class="cad-form">
          <form action="./cadUser.php" method="post">
            <div class="form-group">
              <?php
              echo "<label for='name'>{$translate->lblName}</label>
                        <input type='text' name='name' placeholder='{$translate->placeholderName}' required>";
              ?>
              </label>
            </div>
            <div class="form-group">
              <?php
              echo "<label for='email'>E-mail</label>
                        <input type='email' name='email' placeholder='{$translate->placeholderEmail}' required>";
              ?>
              </label>
            </div>
            <div class="form-group">
              <?php
              echo "<label for='tel'>{$translate->lblTel}</label>
                        <input type='tel' name='tel' placeholder='{$translate->placeholderTel}' required>";
              ?>
              </label>
            </div>

            <div class="form-select">
              <?php
              echo  "<label for='curso'>{$translate->lblCourse}</label>";
              ?>
              <select name="course" id="course" required>
                <?php
                echo "<option value='default' selected disabled>{$translate->placeholderCourse}</option>";
                foreach ($cursos as $curso) {
                  echo "<option value='{$curso->getId()}'>{$curso->getNome()}</option>";
                }
                ?>
              </select>
            </div>

            <?php
              echo "<input type='submit' name='cadStudent' value='{$translate->registerBtn}'>";
            ?>
          </form>
        </div>
      </div>


      <div class="cadTeacher-container" data-hidden="true">
        <div class="title">
          <h1>
            <?php
              echo $translate->menuTeacherRegistration;
            ?>
          </h1>
        </div>

        <div class="cad-form">
          <form action="./cadUser.php" method="post">
            <div class="form-group">
              <?php
              echo "<label for='name'>{$translate->lblName}</label>
                        <input type='text' name='name' placeholder='{$translate->placeholderName}' required>";
              ?>
              </label>
            </div>
            <div class="form-group">
              <?php
              echo "<label for='email'>E-mail</label>
                        <input type='email' name='email' placeholder='{$translate->placeholderEmail}' required>";
              ?>
              </label>
            </div>
            <div class="form-group">
              <?php
              echo "<label for='tel'>{$translate->lblTel}</label>
                        <input type='tel' name='tel' placeholder='{$translate->placeholderTel}' required>";
              ?>
              </label>
            </div>

            <?php
              echo "<input type='submit' name='cadTeacher' value='{$translate->registerBtn}'>";
            ?>
          </form>
        </div>
      </div>


      <div class="cadTutoring-container" data-hidden="true">
        <div class="title">
          <h1>
            <?php
              echo $translate->menuTutoringRegistration;
            ?>
          </h1>
        </div>

        <div class="cad-form">
          <form action="./cadTutoring.php" method="post">
            <div class="form-group">
              <?php
              echo "<label for='start'>{$translate->lblStart}</label>
                        <input type='time' name='start' required>";
              ?>
              </label>
            </div>
            <div class="form-group">
              <?php
              echo "<label for='end'>{$translate->lblEnd}</label>
                        <input type='time' name='end' required>";
              ?>
              </label>
            </div>
            <div class="form-group">
              <?php
              echo "<label for='date'>{$translate->lblTel}</label>
                        <input type='date' name='date' required>";
              ?>
              </label>
            </div>

            <div class="form-select">
              <?php
              echo  "<label for='subject'>{$translate->lblSubject}</label>";
              ?>
              <select name="idMateria" id="subject">
                <?php
                echo "<option value='default' selected disabled>{$translate->placeholderSubject}</option>";
                foreach ($materias as $materia) {
                  echo "<option value='{$materia->getId()}'>{$materia->getNome()}</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <?php
              echo "<label for='sala'>{$translate->lblClass}</label>
                        <input type='text' name='sala' placeholder='{$translate->placeholderClass}' required>";
              ?>
              </label>
            </div>

            <?php

              echo "<input type='submit' name='cadTutoring' value='{$translate->registerBtn}'>";
            ?>
          </form>
        </div>
      </div>

    </div>


  </div>

  <!-- JQUERY -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>

  
  <script>
    // Expande o menu lateral
    $('#open-menu').on("click", function() {
      $('.menu-bar').toggleClass('expand');
      $('.opt-text').toggleClass('displayed');
    });

    // Exibe a listagem de monitorias
    $('.view-monitorias').on("click", function() {
      $('.monitorias-container').attr("data-hidden", "false");

      $('.cadTeacher-container').attr("data-hidden", "true");
      $('.cadStudent-container').attr("data-hidden", "true");
      $('.cadTutoring-container').attr("data-hidden", "true");
    });

    $('.view-cadTeacher').on("click", function() {
      $('.cadTeacher-container').attr("data-hidden", "false");

      $('.monitorias-container').attr("data-hidden", "true");
      $('.cadStudent-container').attr("data-hidden", "true");
      $('.cadTutoring-container').attr("data-hidden", "true");
    });

    $('.view-cadStudent').on("click", function() {
      $('.cadStudent-container').attr("data-hidden", "false");

      $('.monitorias-container').attr("data-hidden", "true");
      $('.cadTeacher-container').attr("data-hidden", "true");
      $('.cadTutoring-container').attr("data-hidden", "true");
    });

    $('.view-cadTutoring').on("click", function() {
      $('.cadTutoring-container').attr("data-hidden", "false");

      $('.monitorias-container').attr("data-hidden", "true");
      $('.cadTeacher-container').attr("data-hidden", "true");
      $('.cadStudent-container').attr("data-hidden", "true");
    });

    // Abre o menu do usuário
    $('#user-logo').on("click", function() {
      if (!($('.lang-opt').hasClass('displayed')))
        $('.opt-account').toggleClass('displayed');
        console.log('aaa');
    });

    // Abre o menu de linguagem do site
    $('#openLangMenu').on("click", function() {
      if (!($('.opt-account').hasClass('displayed')))
        $('.lang-opt').toggleClass('displayed');
    });

    // Fecha os menus ao clicar na div principal de conteudos
    $('.main-content').on("click", function() {
      $('.menu-bar').removeClass('expand');
      $('.opt-text').removeClass('displayed');
      $('.opt-account').removeClass('displayed');
      $('.lang-opt').removeClass('displayed');
    });

    // Pegando a lista de elementos na barra de menu lateral
    let menuOptList = $('.menu-opt-list').get()[0].children;

    // percorrendo a lista e setando que se caso clicar em cima de algum 
    // elemento, minimiza a barra
    for (let i = 0; i < menuOptList.length; i++) {
      let e = menuOptList[i]
      $(e).on("click", function() {
        $('.menu-bar').removeClass('expand');
        $('.opt-text').removeClass('displayed');
      })
    };
  </script>
  <!-- <script>
    $(document).ready(function() {
      $('#materias').on("change", function () {
        let data = $(this).select()[0].selectedOptions[0].label;
        $.ajax({
          url: "index.php",
          method : "POST",
          dataType: "json",
          data: {"data": data},
          error: function (res) {
            console.log(res);
          },
          success: function (res) {
            console.log(res);
          }
        });
      });
    });
  </script> -->
</body>

</html>