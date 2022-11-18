<?php
session_start();
if (!isset($_SESSION['codcliente'])){
    header('Location:telalogin.php');
}