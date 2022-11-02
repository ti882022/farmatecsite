<?php
session_start();
//print_r($_SESSION);

if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header('Location: ../login.php');
    }
    $logado = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmatec</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> 

    <link href="../css/style.css" type="text/css" rel="stylesheet" />
    <style>
        h7 {
            color: white !important;
        }
    </style>
</head>
<body>
<section>

<nav class="container-fluid navbar navbar-expand-sm navbar-dark sticky-top" id="nav">
  <!-- Logo -->

  <a href="index.php"> <img src="../imagens/logo2 - Copia.png" class="img-fluid" alt="Logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- Logo -->



  <!-- Links -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="mx-auto navbar-nav row">
      <li class="nav-item">
        <a class="nav-link" href="promocoes.php">Promoções</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="medicamentos.php">Medicamentos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="suplementos.php">Suplementos</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="higienepessoal.php">Higiene Pessoal</a>
      </li>
    </ul>
    
    <!-- Links -->


    <!-- Pesquisar e login -->
    <form class="mx-auto form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
    </form>
    <ul class="mx-auto navbar-nav row">
      <li class="nav-item">
      <?php
        echo "<h7>Bem vindo <strong>$logado</strong></h7>";
        ?>
      </li>
    </ul>

    <form class="mx-auto" action="sair.php" method="POST"> 
    <input class="btn btn-danger" type="submit" name="submit" value="Sair">
    </form>

    <img class="mx-auto numerocar" src="../Imagens/carrinho.png">
  </nav>



<br> <br>
        
          
    
        <Section class="container-fluid">
          
    
    <!-- catalogo -->
    
    
    <!-- catalogo -->
    <div id="ofertas">
      <p style="text-align: center;"><strong>Suplementos</strong> </p>
      </div>
      <br><br>
      <div class="container-fluid">
        <div class="row">
        <div class="col-12">
      <div class="card-deck">
        <div class="col-md-2">
          
          <a href="#" rel="noopener noreferrer"><img class="card-img-top" src="../Produtos/bcaa.png" alt="Card image cap"></a>
          <div class="card-body">
            <p id="nomeprod"><strong>BCAA TOP 4:1:1</strong></p>
            <p> <strong>Integral médica</strong></p>
            <h6 class="card-subtitle">De  R$ <s>109,99</s></h6>
            <p class="card-text">Por R$ 78,92</p>
            <button type="button" class="btn btn-danger col-md-12"><a id="botao" href="index.php">Comprar</a></button>
            
          </div>
        </div>
        <div class="col-md-2">
          
          <a href="#" rel="noopener noreferrer"><img class="card-img-top" src="../Produtos/whey.png" alt="Card image cap"></a>
          <div class="card-body">
          <p id="nomeprod"><strong>WHEY PROTEIN 909G</strong></p>
            <p><strong>Optimum Nutrition</strong></p>
            <p class="card-text">Por R$ 319,99</p>
            <h6 class="card-subtitle">ㅤㅤㅤㅤ</h6>
            <button type="button" class="btn btn-danger col-md-12"><a id="botao" href="index.php">Comprar</a></button>
            
          </div>
        </div>
        <div class="col-md-2">
          
          <a href="#" rel="noopener noreferrer"><img class="card-img-top" src="../Produtos/suplementocaffeina.png" alt="Card image cap"></a>
          <div class="card-body">
          <p id="nomeprod"><strong>Caffeine Volcanic</strong></p>
          <p><strong>Synthesize</strong></p>
          <h6 class="card-subtitle">De  R$ <s>72,80</s></h6>
            <p class="card-text">Por R$ 63,72</p>
            <button type="button" class="btn btn-danger col-md-12"><a id="botao" href="index.php">Comprar</a></button>
            
          </div>
        </div>
        <div class="col-md-2">
          
          <a href="#" rel="noopener noreferrer"><img class="card-img-top" src="../Produtos/creatina2.png" alt="Card image cap"></a>
          <div class="card-body">
            <p id="nomeprod"><strong>CREATINA 250g Creapure</strong></p>
            <p><strong>Ghowth</strong></p>
            <p class="card-text">Por R$  89,99</p>
            <h6 class="card-subtitle">ㅤㅤㅤㅤ</h6>
            <button type="button" class="btn btn-danger col-md-12"><a id="botao" href="index.php">Comprar</a></button>
            
          </div>
        </div>
        <div class="col-md-2">
          
          <a href="#" rel="noopener noreferrer"><img class="card-img-top" src="../Produtos/omega3.png" alt="Card image cap"></a>
          <div class="card-body">
          <p id="nomeprod"><strong>Vitamina Ômega 3</strong></p>
          <p><strong>Neo Quimica</strong></p>
          <h6 class="card-subtitle">De  R$ <s>29,99</s></h6>
            <p class="card-text">Por R$ 23,99</p>
            <button type="button" class="btn btn-danger col-md-12"><a id="botao" href="index.php">Comprar</a></button>
          
        </div>
      </div>
      <div class="col-md-2">
          
        <a href="#" rel="noopener noreferrer"><img class="card-img-top" src="../Produtos/nutrensenior.png" alt="Card image cap"></a>
          <div class="card-body">
          <p id="nomeprod"><strong>Nutren Senior 370g</strong></p>
          <p><strong>Nestle</strong><p>
            <p class="card-text">Por R$ 77,49</p>
            <h6 class="card-subtitle">ㅤㅤㅤㅤ</h6>
            <button type="button" class="btn btn-danger col-md-12"><a id="botao" href="index.php">Comprar</a></button>
        
      </div>
    </div>
    </div>
    </div>
    </div>
    
    <!-- catalogo -->
    
    
    
        </Section> <!-- catalogos -->
        
        <br>
        <br>
    
       <!-- footer -->
       <footer id="footer" style="margin-top: 50px;">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-contact">
                        <a href="#"><img src="../Imagens/logo branca.png" alt="" width="32px">FarmaTec Loja Online</a>
                        <p>
                            FarmaTec <br>
                            <strong>Phone:</strong>+55(11) 0000-0000 <br>
                            <strong>Email:</strong>farmatec@example.com <br>
                        </p>
    
                    </div>
                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Atalhos</h4>
                        <ul>
                        <li><i class="bx bx-chevron-right"></i><a href="index.php">Pagina Inicial</a></li>
                        <li><i class="bx bx-chevron-right"></i><a href="promocoes.php">Promoções</a></li>
                        <li><i class="bx bx-chevron-right"></i><a href="medicamentos.php">Medicamentos</a></li>
                        <li><i class="bx bx-chevron-right"></i><a href="suplementos.php">Suplementos</a></li>
                        <li><i class="bx bx-chevron-right"></i><a href="higienepessoal.php">Higiene Pessoal</a></li>
                    </ul>
                    </div>
                  
                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Redes Sociais</h4>
                        <p>Siga-nos em nossas redes sociais para acompanhar produtos e demais ofertas.</p>
                        <div class="socail-links mt-3">
                          <a href="#"><img src="../Imagens/whatsapp.png" alt="" width="32px"></a>
                          <a href="#"><img src="../Imagens/facebook.png" alt="" width="32px"></a>
                          <a href="#"><img src="../Imagens/instagram.png" alt="" width="32px"></a>
                        </div>
                    </div>
                
            </div>
        </div>
        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span class="footername">FarmaTec</span></strong>. All Rights Reseved
            </div>
            <div class="credits"> 
             <p href="#">   Designed by TI88</p>
            </div>
        </div>  
    </footer>
 
    </section>
    </body>
    </html>