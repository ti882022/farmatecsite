<?php
    session_start();

    $logado = $_SESSION['usuario'];

    if(isset($_POST['submit'])) 
    {
    
    include_once('../databases/BdturmaConect.php');

    $query = "UPDATE tbusuarios SET logado=1 WHERE usuario = '$logado'";

    $dbcontroller = new BdturmaConect();

    $rawData = $dbcontroller->executeQuery($query);

    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header("Location: ../login.php");

    }
    
?>