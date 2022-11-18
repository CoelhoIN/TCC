<?php
session_start();
unset($_SESSION['codcliente']);
header('Location: index.php');