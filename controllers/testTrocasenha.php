<?php
    session_start();
    // print_r($_REQUEST);

    if(isset($_POST['submit']) && !empty($_POST['txtnome']) && !empty($_POST['txtemail']))

    {
        // Acessa
       include_once('../databases/BdturmaConect.php');
        $nome = $_POST['txtnome'];
        $email = $_POST["txtemail"];
        $senhanova = $_POST['txtsenhanova'];

        // print_r('Email: ' . $email);
        // print_r('<br>');
        // print_r('Senha: ' . $senha);

        $query = "SELECT * FROM tbusuarios WHERE nome = '$nome' and email = '$email'";

        $dbcontroller = new BdturmaConect();

        $rawData = $dbcontroller->executeSelectQuery($query);

            //print_r($query);
            //print_r($rawData);


             if(($rawData) < 1)
             {

                unset($_SESSION ['nome']);
                header('Location: ../usuario/trocarsenha.php');
             }
              else
              {

                $query = "UPDATE tbusuarios SET senha='$senhanova' WHERE email = '$email'";

                $dbcontroller = new BdturmaConect();

                $rawData = $dbcontroller->executeQuery($query);

                $query = "UPDATE tbusuarios SET logado=1 WHERE usuario = '$email'";

                $dbcontroller = new BdturmaConect();

                $rawData = $dbcontroller->executeQuery($query);

                
                unset($_SESSION['nome']);
                unset($_SESSION['email']);

                header('Location: ../login.php');

              }

              
        }
        else
    
    {
        // Não acessa
        header('Location: ../login.php');
    }
?>