<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Formulário de Cadastro</title>
	<style type="text/css">
		*{
			margin:0;
			padding:0;
			font-family: Arial, Verdana, Trebuchet MS;
		}
		form{
			border:1px solid #DDD;
			width: 220px;
			margin:30px auto 0;
			padding: 20px;
			font-size: 14px;
		}
		fieldset{
			border:none;
		}
		input[type="text"] {
			border:1px solid #ddd;
			width: 215px;
		}
		.clausure{
			color:#FF0000;
			font-size: 12px;
			font-style: italic;
		}
	</style>

	<script src="js/jquery.min.js" type="text/javascript"></script>
	
</head>
<body>
	
	<form action="cep.php" method="get" >
		<fieldset>
			<legend>Carregamento automatico com CEP</legend>
			<br/>
			<label for="">Insira seu cep: <i class="clausure">*somente numeros</i>?</label><br/>
			<input type="text" name="cep" id="cep"/><br/><br/>

			<label for="">Cidade</label><br/>
			<input type="text" name="cidade" id="cidade"  value="" /> <br/><br/>

			<label for="">Bairros</label><br/>
			<input type="text" name="bairro" id="bairro" value="" /> <br/><br/>

			<label for="">Logradouro:</label><br/>
			<input type="text" name="logradouro" id="logradouro" value=""/> <br/><br/>

			<label for="">UF:</label><br/>
			<input type="text" name="uf" id="uf"  value="" /> <br/><br/>

			<input type="submit" value="cadastrar" id="Btocadatrar" /><br/>

		</fieldset>
	</form>

	<p></p>

	<script>
	$(function(){
	    $('#cep').change(function(){
	 
	    $.ajax({
	            type      : 'post',
	            url       : 'process.php',
	            data      : 'cep='+ $('#cep').val(),
	            dataType  : 'html',
	            success : function(txt){

	            	eval("var dadosJson = "+txt+";");
	            	var novo = JSON.stringify(dadosJson);
	            	console.log(dadosJson.tipologradouro);
	            	$("#cidade").val(dadosJson.cidade);
	            	$("#bairro").val(dadosJson.bairro);
	            	$("#logradouro").val(dadosJson.tipologradouro +" "+ dadosJson.logradouro);
	            	$("#uf").val(dadosJson.uf);
	            	$("#Btocadatrar").focus();
	            }
	        });
	 
	        });
	    });
		//- See more at: http://tutsmais.com.br/blog/ajax/ajax-com-jquery-enviando-dados-via-ajax/#sthash.RMdHKork.dpuf

	</script>

</body>
</html>