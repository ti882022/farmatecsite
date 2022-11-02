<?php
//Não apresentar tela com erros
//ini_set('display_errors','0');

use LDPA\Result;

require_once("../databases/BdturmaConect.php");
require_once("../config/SimpleRest.php");

$page_key="";
// termo extends pega emprestado o conteudo do arquivo 1 pra o 2
class ProdutosResHandler extends SimpleRest{
    public function ProdutosIncluir(){

        if(isset($_POST["txtdescricao"])) {

            $descricao=$_POST["txtdescricao"];
            $marca=$_POST['txtmarca'];
            $fornecedor=$_POST['txtfornecedor'];
            $categoria=$_POST['txtcategoria'];
            $unidade=$_POST['txtunidade'];
            $estoquemin=$_POST['txtestoquemin'];
            $imagem=$_POST['txtimagem'];
            $preco=$_POST['txtpreco'];


            $query="CALL spInserirProdutos(:pdescricao,:pmarca,:pfornecedor,:pcategoria,:punidade,:pestoquemin,:pimagem ,:ppreco)";
            $array = array(":pdescricao"=>"{$descricao}",":pmarca"=>"{$marca}",":pfornecedor"=>"{$fornecedor}",":pcategoria"=>"{$categoria}",":punidade"=>"{$unidade}",":pestoquemin"=>"{$estoquemin}",":pimagem"=>"{$imagem}",":ppreco"=>"{$preco}",);
            //Instanciar a classe BdTurmaConnect
             $dbcontroller = new BdturmaConect();

             $rawData = $dbcontroller->executeProcedure($query,$array);
            
            //Verificar se o retorno esta "vazio"
            if(empty($rawData)){
                $statusCode = 404;
                $rawData = array('sucesso' => 0);
            }
            else{
                $statusCode = 200;
            }
            
            $requestContentType = $_POST['HTTP_ACCEPT'];
            $this -> setHttpHeaders($requestContentType, $statusCode);
            $result["RetornoDados"] = $rawData;

            if(strpos($requestContentType,'application/Json') !==false){
                $response = $this->encodeJson($result);
                echo $response;
            }

        }

    }

    public function EstoqueMovimentar(){

        if(!empty($_POST["txtcodprod"])){

            $status = $_POST["txtstatus"];
            $produto = $_POST["txtcodprod"];
            $qtde = $_POST["txtqtde"];
            $descricao = $_POST["txtdesc"];
        //Informar a Stored Produre e seus Parâmetros
        $query="CALL spMovimentarEstoque(:pstatus,:pcodigoprod,:pqtde,:pdescricao)";
        //Definir o conjunto de dados
        $array = array(":pstatus"=>"{$status}",":pcodigoprod"=>"{$produto}",":pqtde"=>"{$qtde}",":pdescricao"=>"{$descricao}");
            //Instanciar a classe BdTurmaConect
            $dbcontroller = new BdturmaConect ();
            //Chamar o método
            $rawData = $dbcontroller->executeProcedure($query,$array);
            //Verificar se o retorno está "Vazio"
            if(empty($rawData)){
                $statusCode = 404;
                $rawData = array('sucesso'=> 0);
            }
            else{
                $statusCode = 200;
                $rawData = array('sucesso'=> 1);
            }
            $requestContentType = $_POST['HTTP_ACCEPT'];
            $this ->setHttpHeaders($requestContentType, $statusCode);

            $Result["RetornoDados"] = $rawData;

            if(strpos($requestContentType,'application/Json')!== false){
                $response = $this -> encodeJson($Result);
                echo $response;

            }

        }

    }

    public function ProdutosConsultar(){

        if(!empty($_POST["txtcategoria"])){

            $categoria = $_POST["txtcategoria"];
        //Informar a Stored Produre e seus Parâmetros
        $query="CALL spConsultarProdutos(:pcategoria)";
        //Definir o conjunto de dados
        $array = array(":pcategoria"=>"{$categoria}");
            //Instanciar a classe BdTurmaConect
            $dbcontroller = new BdturmaConect ();
            //Chamar o método
            $rawData = $dbcontroller->executeProcedure($query,$array);
            //Verificar se o retorno está "Vazio"
            if(empty($rawData)){
                $statusCode = 404;
                $rawData = array('sucesso'=> 0);
            }
            else{
                $statusCode = 200;
            }
            $requestContentType = $_POST['HTTP_ACCEPT'];
            $this ->setHttpHeaders($requestContentType, $statusCode);

            $Result["RetornoDados"] = $rawData;

            if(strpos($requestContentType,'application/Json')!== false){
                $response = $this -> encodeJson($Result);
                echo $response;
            }
        }
    }

    public function AtualizarPreco(){
            if(!empty($_POST["txtcodprod"])){

            $codprod = $_POST["txtcodprod"];
            $preco = $_POST["txtpreco"];
        //Informar a Stored Produre e seus Parâmetros
        $query="CALL spAtualizarPreco(:pcodprod,:ppreco)";
        //Definir o conjunto de dados
        $array = array(":pcodprod"=>"{$codprod}",":ppreco"=>"{$preco}");
            //Instanciar a classe BdTurmaConect
            $dbcontroller = new BdturmaConect ();
            //Chamar o método
            $rawData = $dbcontroller->executeProcedure($query,$array);
            //Verificar se o retorno está "Vazio"
            if(empty($rawData)){
                $statusCode = 404;
                $rawData = array('sucesso'=> 0);
            }
            else{
                $statusCode = 200;
                $rawData = array('sucesso'=> 1);
            }
            $requestContentType = $_POST['HTTP_ACCEPT'];
            $this ->setHttpHeaders($requestContentType, $statusCode);

            $Result["RetornoDados"] = $rawData;

            if(strpos($requestContentType,'application/Json')!== false){
                $response = $this -> encodeJson($Result);
                echo $response;

            }

        }
    }

    public function encodeJson($responseData){
        $JsonResponse = json_encode($responseData);
        return $JsonResponse;
    }
}

    if(isset($_GET["page_key"])){
        $page_key = $_GET["page_key"];
    }

    else{

    if(isset($_POST["page_key"])){
        $page_key = $_POST["page_key"];
    }
}


if(isset($_POST["btnEnviar"])) {  
    $page_key = "Incluir";
    $_POST['HTTP_ACCEPT'] = "application/Json";
    
 }

 if(isset($_POST["btnListar"])) {  
    $page_key = "Consultar";
    $_POST['HTTP_ACCEPT'] = "application/Json";
 }

switch($page_key){

    case "Incluir":
        //esta passando o conteudo(instanciando) do ProdutosResHandler para o $Usuarios
        $Produtos = new ProdutosResHandler();
        $Produtos -> ProdutosIncluir();
        break;

    case "Movimentar":
        //esta passando o conteudo(instanciando) do ProdutosResHandler para o $Usuarios
        $Produtos = new ProdutosResHandler();
        $Produtos -> EstoqueMovimentar();
        break;

    case "Consultar":
        //esta passando o conteudo(instanciando) do ProdutosResHandler para o $Usuarios
        $Produtos = new ProdutosResHandler();
        $Produtos -> ProdutosConsultar();
        break;      
    case "Atualizar":
        //esta passando o conteudo(instanciando) do ProdutosResHandler para o $Usuarios
        $Produtos = new ProdutosResHandler();
        $Produtos -> AtualizarPreco();
        break;  

}






?>