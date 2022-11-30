<?php
session_start();
// $path = $_SERVER['SERVER_NAME'].'/trabalho-final-prog3/src';
if (!isset($_SESSION['idUsuario'])) {
  header("Location: ../../components/login");
}
