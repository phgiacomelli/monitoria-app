<?php
session_start();
if (isset($_SESSION['idUsuario'])) {
    if (isset($_POST['submitRestrita'])) {
        header("Location: ".$_POST['location']);
    }
}
header("Location: ../../components/login");

?>