<?php
  require_once("../../assets/utils/restrita.php");
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
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

  <title>Monitoria-app | Home</title>
</head>

<body>
  <div class="container">
    <div class="header">
      <div class="logo">
        <svg id="open-menu" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
          style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
          <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path>
        </svg>
        <h1>Monitoria-app</h1>
      </div>
      <div class="user-opt">
        <p class="user">
          <?php
            echo $_SESSION['nome'];
          ?>
        </p>
        <svg class="user" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
          style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
          <path
            d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z">
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

    </div>


  </div>

  <!-- JQUERY -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
     $('#open-menu').on("click", function () {
      $('.menu-bar').toggleClass('expand');
     });

    $('.user').on("click", function () {
      $('.opt-account').toggleClass('displayed');
      console.log("b");
    });
  </script>
</body>

</html>