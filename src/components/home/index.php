<?php

use models\Materia;
use models\Monitoria;

require_once('../../../vendor/autoload.php');
require_once("../../assets/utils/restrita.php");


$monitorias = Monitoria::findAll();
// var_dump($monitorias[0]);
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

  <title>Monitoria-app | Home</title>
</head>

<body>
  <div class="container">
    <div class="header">
      <div class="logo">
        <svg id="open-menu" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
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

        <svg id="user-logo" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
          <path d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z">
          </path>
        </svg>

        <div class="opt-account">
          <ul>
            <li>
              <a href="#">Minha conta</a>
            </li>
            <li>
              <a href="../../assets/utils/logout.php">Sair</a>
            </li>
          </ul>
        </div>

        <span class="material-symbols-outlined">language</span>
      </div>
    </div>
    <div class="menu-bar">
      <div class="menu-opt">
        <div class="menu-opt-content">
          <ul>
            <li>
              <a href="#" class="view-monitorias" title="Visualizar monitorias">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" style="transform: ;msFilter:;">
                  <path d="M19.893 3.001H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h15.893c1.103 0 2-.897 2-2V5a2.003 2.003 0 0 0-2-1.999zM8 19.001H4V8h4v11.001zm6 0h-4V8h4v11.001zm2 0V8h3.893l.001 11.001H16z"></path>
                </svg>
                <p class="opt-text">
                  Visualizar monitorias
                </p>
              </a>
            </li>
            <li>
              <a href="#" title="Candidatar-se à monitor">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" style="transform: ;msFilter:;">
                  <path d="M20 6h-3V4c0-1.103-.897-2-2-2H9c-1.103 0-2 .897-2 2v2H4c-1.103 0-2 .897-2 2v11c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V8c0-1.103-.897-2-2-2zm-5-2v2H9V4h6zM8 8h12v3H4V8h4zM4 19v-6h6v2h4v-2h6l.001 6H4z"></path>
                </svg>
                <p class="opt-text">
                  Candidatar-se à monitor
                </p>
              </a>
            </li>
            <?php

            if ($_SESSION['tipo'] == 'admin') {

              $features = "
              <li>
                <a href='#' title='Aluno'>
                <svg xmlns='http://www.w3.org/2000/svg' width='28' height='28' viewBox='0 0 24 24' style='transform: ;msFilter:;'><path d='M9.715 12c1.151 0 2-.849 2-2s-.849-2-2-2-2 .849-2 2 .848 2 2 2z'></path><path d='M20 4H4c-1.103 0-2 .841-2 1.875v12.25C2 19.159 2.897 20 4 20h16c1.103 0 2-.841 2-1.875V5.875C22 4.841 21.103 4 20 4zm0 14-16-.011V6l16 .011V18z'></path><path d='M14 9h4v2h-4zm1 4h3v2h-3zm-1.57 2.536c0-1.374-1.676-2.786-3.715-2.786S6 14.162 6 15.536V16h7.43v-.464z'></path></svg>
                
                  <p class='opt-text'>
                    Aluno
                  </p>
                </a>
              </li>
              <li>
                <a href='#' title='Professor'>
                <svg xmlns='http://www.w3.org/2000/svg' width='28' height='28' viewBox='0 0 24 24' style='transform: ;msFilter:;'><path d='M2 7v1l11 4 9-4V7L11 4z'></path><path d='M4 11v4.267c0 1.621 4.001 3.893 9 3.734 4-.126 6.586-1.972 7-3.467.024-.089.037-.178.037-.268V11L13 14l-5-1.667v3.213l-1-.364V12l-3-1z'></path></svg>
                  <p class='opt-text'>
                    Professor
                  </p>
                </a>
              </li>";
              echo $features;
            }
            ?>

          </ul>
        </div>
      </div>
    </div>

    <div class="main-content">

      <div class="monitorias-container" data-hidden="true">
        <div class="title">
          <h1>
            Listagem de Monitorias
          </h1>
        </div>

        <div class="monitorias-list">
          <?php
          foreach ($monitorias as $monitoria) {
            $materia = Materia::find($monitoria->getIdMateria());
            $template =
              "<div class='monitoria'>
            <div class='monitoria-header'>
              <h2>{$materia->getNome()}</h2>
            </div>
            <div class='monitoria-content'>
              <p class='monitoria-date'>Data: {$monitoria->getData()}</p>
              <div class='monitoria-hours'>
                <p>
                  Início: {$monitoria->getHorarioInicio()}
                </p>
                <p>
                  Fim: {$monitoria->getHorarioFim()}
                </p>
              </div>
            </div>
            <div class='monitoria-btn'>
            <p>
              Marcar Presença
            </p>
            </div>
          </div>";
            echo $template;
          }

          ?>







          <div class="monitoria">
            <div class="monitoria-header">
              <h2>Matemática</h2>
            </div>
            <div class="monitoria-content">
              <p class="monitoria-date">Data: 29/11/2022</p>
              <div class="monitoria-hours">
                <p>
                  Início: 10:00
                </p>
                <p>
                  Fim: 10:00
                </p>
              </div>
            </div>
            <div class="monitoria-btn">
              Marcar Presença
            </div>
          </div>


        </div>
      </div>
    </div>


  </div>

  <!-- JQUERY -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $('#open-menu').on("click", function() {
      $('.menu-bar').toggleClass('expand');
      $('.opt-text').toggleClass('displayed');
    });

    $('.view-monitorias').on("click", function(){
      
      console.log($('.monitorias-container').attr("data-hidden","false"));
    });

    $('#user-logo').on("click", function() {
      $('.opt-account').toggleClass('displayed');
    });
  </script>
  <script>

  </script>
</body>

</html>