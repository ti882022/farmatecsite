<?php
    session_start();
    // print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['txtusuario']) && !empty($_POST['txtsenha']))

    {
        // Acessa
       include_once('../databases/BdturmaConect.php');
       $usuario = $_POST['txtusuario'];
       $senha = $_POST['txtsenha'];

        // print_r('Email: ' . $email);
        // print_r('<br>');
        // print_r('Senha: ' . $senha);

        $query = "SELECT * FROM tbusuarios WHERE usuario = '$usuario' and senha = '$senha'";

        $dbcontroller = new BdturmaConect();

        $rawData = $dbcontroller->executeSelectQuery($query);

            //print_r($query);
            //print_r($rawData);


             if(($rawData) < 1)
             {

                unset($_SESSION ['usuario']);
                unset($_SESSION ['senha']);
                header('Location: ../login.php');
             }
              else
              {

                $query = "UPDATE tbusuarios SET logado=2 WHERE usuario = '$usuario' and senha = '$senha'";

                $dbcontroller = new BdturmaConect();

                $rawData = $dbcontroller->executeQuery($query);

                $_SESSION['usuario'] = $usuario;
                $_SESSION['senha'] = $senha;

                header('Location: ../usuario/index.php');
              }

              
        }
    else
    
    {
        // Não acessa
        header('Location: ../login.php');
    }
?>