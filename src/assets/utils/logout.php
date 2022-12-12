<?php
session_start();
session_destroy();
header("Location: ../../components/login");
session_start();
$_SESSION['language'] = 'en';
