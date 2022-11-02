// Função para criar um objeto XMLHTTPRequest
//

function CriaRequest() {
	try{
		request = new XMLHttpRequest();        
	}
	catch (IEAtual){
		try{
			request = new ActiveXObject("Msxml2.XMLHTTP");       
		}
		catch(IEAntigo){
			try{
				request = new ActiveXObject("Microsoft.XMLHTTP");          
			}
			catch(falha){
				request = false;
			}
		}
	}
	if (!request){ 
		alert("Seu Navegador não suporta Ajax!");
	}
	else{
		return request;
	}
}

$(document).ready(function(){


	$("#txtcep").mask('00000-000');
	$('#txtfoneCliente').mask('(00)00000-0000');
	$('#txtcpf').mask('000.000.000-00');
	

    $('#btnListar').click(function(){
        // alert("Teste");
    ClientesConsultar();
    });
	$('#btnEnviar').click(function(){
        // alert("Teste");
	ClientesIncluir();
    });
	$('#link_cep').click(function(){
        // alert("Teste");
    BuscaCep();
    });
});

$(function(){
	//Dialog
	$('#dialog').dialog({
		autoOpen: false,
		width: 600,
		buttons: {
			"OK": function() {
			$(this).dialog("close");
			},
		}
	});
	
});

function ClientesConsultar(){
    // alert("Teste Método");
    var strnome = $('input[id=txtnomeCliente]').val();
	//Definir a url
	var url = "../controllers/ControleClientes.php";
    //var url = "../controllers/ControleContatos.php?page_key=Consultar"+"&txtNome="+strnome+"&HTTP_ACCEPT=application/json";

	//Instanciar o método
	var xmlreq = CriaRequest();
	//Iniciar uma requisição
	xmlreq.open('POST',url,true);

	//Cabeçalho de envio
	xmlreq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	//Verificar a situação da conexão com o servidor
	xmlreq.onreadystatechange = function(){
		//Verificar se foi concluído com sucesso e se a conexão não foi fechada (readyState=4)
		if(xmlreq.readyState == 4){
			//Verificar se o status da conexão é 200
			if(xmlreq.status == 200){
				//alert(xmlreq.responseText);
				MostrarContatos(JSON.parse(xmlreq.responseText));
			}
		}
	};
	//Envio dos parâmetros
	xmlreq.send("page_key=Consultar"+"&txtnomeCliente="+strnome+"&HTTP_ACCEPT=application/json");
	//xmlreq.send(null);
}

function ClientesIncluir(){

	var controle = 0;

	var itensform = document.forms['frmcontato'];
	var qtditens = itensform.elements.length;



	for (var i = 0; i < qtditens; i++) {
		if ((itensform.elements[i].type == 'email' || itensform.elements[i].type == 'text') && itensform.elements[i].value == "") {
			controle += 1;
			itensform.elements[i].style.background = 'yellow';
		}
		else {
			itensform.elements[i].style.background = 'white';
		}
	}

	if (controle > 0) {
		msgHtml = "Favor preencher os campos em destaque";
		$('#dialog').dialog('open');
		$('#Mensagem').html(msgHtml);
	}

	else {
    // alert("Teste Método");
    var strnome = $('input[id=txtnomeCliente]').val();
	var stremail = $('input[id=txtemailCliente]').val();
	var strendereco = $('input[id=txtendereco]').val();
	var strtelefone = $('input[id=txtfoneCliente]').val().replace(/[().-]/g,"");
	var strbairro = $('input[id=txtbairro]').val();
	var strcidade = $('input[id=txtcidade]').val();
	var struf = $('input[id=txtuf]').val();
	var strcpf = $('input[id=txtcpf]').val().replace(/[().-]/g,"");
	var strcep = $('input[id=txtcep]').val().replace(/[-]/g,"");
	var strusuario = $('input[id=txtusuario]').val();
	var strsenha = $('input[id=txtsenha]').val();
	var strlogado = 1;
	//Definir a url
	var url = "http://10.38.45.24:8080/farmatec-api/clientes/incluir/";
    //var url = "../controllers/ControleContatos.php?page_key=Consultar"+"&txtNome="+strnome+"&HTTP_ACCEPT=application/json";

	//Instanciar o método
	var xmlreq = CriaRequest();
	//Iniciar uma requisição
	xmlreq.open('POST',url,true);

	//Cabeçalho de envio
	xmlreq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	//Verificar a situação da conexão com o servidor
	xmlreq.onreadystatechange = function(){
		//Verificar se foi concluído com sucesso e se a conexão não foi fechada (readyState=4)
		if(xmlreq.readyState == 4){
			//Verificar se o status da conexão é 200
			if(xmlreq.status == 200){
				alert(xmlreq.responseText);
				//MostrarContatos(JSON.parse(xmlreq.responseText));
			}
		}
	};
	//Envio dos parâmetros
	xmlreq.send("page_key=Incluir"+
	"&txtnomeCliente="+strnome+
	"&txtendereco="+strendereco+
	"&txtfoneCliente="+strtelefone+
	"&txtbairro="+strbairro+
	"&txtcidade="+strcidade+
	"&txtuf="+struf+
	"&txtcep="+strcep+
	"&txtcpf="+strcpf+
	"&txtusuario="+strusuario+
	"&txtsenha="+strsenha+
	"&txtlogado="+strlogado+
	"&txtemailCliente="+stremail+"&HTTP_ACCEPT=application/json");
	//xmlreq.send(null);
	document.getElementById('frmcontato').reset();
} 
}

function TrocaSenha(){

	var controle = 0;

	var itensform = document.forms['frmtroca'];
	var qtditens = itensform.elements.length;



	for (var i = 0; i < qtditens; i++) {
		if ((itensform.elements[i].type == 'email' || itensform.elements[i].type == 'password' || itensform.elements[i].type == 'text') && itensform.elements[i].value == "") {
			controle += 1;
			itensform.elements[i].style.background = 'yellow';
		}
		else {
			itensform.elements[i].style.background = 'white';
		}
	}

	if (controle > 0) {
		msgHtml = "Favor preencher os campos em destaque";
		$('#dialog').dialog('open');
		$('#Mensagem').html(msgHtml);
	}

	else {
    // alert("Teste Método");
    var strnome = $('input[id=txtnome]').val();
	var stremail = $('input[id=txtemail]').val();
	var strsenha = $('input[id=txtsenha]').val();
	var strsenhanova = $('input[id=txtsenhanova]').val();
	//Definir a url
	var url = "../controllers/ControleUsuarios.php";
    //var url = "../controllers/ControleContatos.php?page_key=Consultar"+"&txtNome="+strnome+"&HTTP_ACCEPT=application/json";

	//Instanciar o método
	var xmlreq = CriaRequest();
	//Iniciar uma requisição
	xmlreq.open('POST',url,true);

	//Cabeçalho de envio
	xmlreq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	//Verificar a situação da conexão com o servidor
	xmlreq.onreadystatechange = function(){
		//Verificar se foi concluído com sucesso e se a conexão não foi fechada (readyState=4)
		if(xmlreq.readyState == 4){
			//Verificar se o status da conexão é 200
			if(xmlreq.status == 200){
				alert(xmlreq.responseText);
				//MostrarContatos(JSON.parse(xmlreq.responseText));
			}
		}
	};
	//Envio dos parâmetros
	xmlreq.send("page_key=Trocar"+
	"&txtnome="+strnome+
	"&txtsenha="+strsenha+
	"&txtsenhanova="+strsenhanova+
	"&txtemail="+stremail+"&HTTP_ACCEPT=application/json");
	//xmlreq.send(null);
	document.getElementById('frmtroca').reset();
} 
}

function BuscaCep(){
    // alert("Teste Método");
    var strcep = $('input[id=txtCEP]').val();
	//Definir a url
     var url = "http://viacep.com.br/ws/"+ strcep +"/json";

	//Instanciar o método
	var xmlreq = CriaRequest();
	//Iniciar uma requisição
	xmlreq.open('GET',url,true);

	//Verificar a situação da conexão com o servidor
	xmlreq.onreadystatechange = function(){
		//Verificar se foi concluído com sucesso e se a conexão não foi fechada (readyState=4)
		if(xmlreq.readyState == 4){
			//Verificar se o status da conexão é 200
			if(xmlreq.status == 200){
				//alert(xmlreq.responseText);
				PreencherCampos(JSON.parse(xmlreq.responseText));
			}
		}
	};
	//Envio dos parâmetros
	//xmlreq.send("page_key=Consultar"+"&txtNome="+strnome+"&HTTP_ACCEPT=application/json");
	xmlreq.send(null);
}

function MostrarContatos(obj){
	var strTabela = "<table border=1><thead><th>Nome</th><th>Email</th><th>Telefone</th><th>CEP</th><th>Endereço</th><th>Bairro</th><th>Cidade</th><th>UF</th></thead>";
	result = document.getElementById('Resultado');
	if(obj.RetornoDados.length > 1){
		for (var i=0;i < obj.RetornoDados.length;i++){
			strTabela += "<tbody><tr><td>" +
			obj.RetornoDados[i].nomedocontato + '</td><td>' +
			obj.RetornoDados[i].emailcontato + '</td><td>' +
			obj.RetornoDados[i].telefonecontato + '</td><td>' +
			obj.RetornoDados[i].cep + '</td><td>' +
			obj.RetornoDados[i].enderecocontato + '</td><td>' +
			obj.RetornoDados[i].bairro + '</td><td>' +
			obj.RetornoDados[i].cidade + '</td><td>' +			
			obj.RetornoDados[i].uf + '</td></tr>' 
			
		}
		strTabela += "</tbody></table>";
		result.innerHTML = strTabela;
		
	}
	else{
		$('input[name=txtNome]').val(obj.RetornoDados[0].nomedocontato);
		$('input[name=txtEmail]').val(obj.RetornoDados[0].emailcontato);
		$('input[name=txtFone]').val(obj.RetornoDados[0].telefonecontato);
		$('input[name=txtCEP]').val(obj.RetornoDados[0].cep);
		$('input[name=txtEndereco]').val(obj.RetornoDados[0].enderecocontato);
		$('input[name=txtBairro]').val(obj.RetornoDados[0].bairro);	
		$('input[name=txtCidade]').val(obj.RetornoDados[0].cidade);		
		$('input[name=txtUF]').val(obj.RetornoDados[0].uf);
		
	}

}

function PreencherCampos(obj){
	
	if (obj.erro == "true"){
		$('#dialog').dialog('open');
		msgHtml = "Cep Inválido";
		$('#Mensagem').html(msgHtml);
		$('input[id=txtCEP]').val("");
		}


	else{
		$('input[name=txtEndereco]').val(obj.logradouro);
		$('input[name=txtBairro]').val(obj.bairro);	
		$('input[name=txtCidade]').val(obj.localidade);		
		$('input[name=txtUF]').val(obj.uf);
		
	}

}



