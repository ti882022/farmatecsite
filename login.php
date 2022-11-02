<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> 
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css">


</head>
<body>
    <nav class="container-fluid navbar navbar-expand-sm navbar-dark sticky-top" id="nav">
        <!-- Logo -->
    
        <a href="index.html"> <img src="imagens/logo2 - Copia.png" class="img-fluid" alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Logo -->
      
    
    
        <!-- Links -->
        
          
          <!-- Links -->
      </nav>
      
   
        <br>
        <br>

        
        <form class="logindiv" action="/farmatec/controllers/testLogin.php" method="POST">
        <h1>Login</h1>
        <input class="input1" type="text" id="txtusuario" name="txtusuario" placeholder="Nome de usuario">
        <br><br>
        <input class="input1" type="password" id="txtsenha" name="txtsenha" placeholder="Senha">
        <br><br>
        <input class="botao" type="submit" name="submit"></input>
        <br>
        <br>
        <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="/farmatec/usuario/trocarsenha.php">Esqueceu a sua Senha?</a></p>
        <p class="mb-0">Não tem Conta? <a href="views/cadastro.html" class="text-white-50 fw-bold">Cadastre-se</a>
        </p>
        </form>
   

</body>
</html>