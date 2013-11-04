<?php 


function busca_cep($cep){  

   $resultado = @file_get_contents('http://republicavirtual.com.br/web_cep.php?cep='.urlencode($cep).'&formato=query_string');  
    if(!$resultado){  
        $resultado = "&resultado=0&resultado_txt=erro+ao+buscar+cep";  
    }  
    parse_str($resultado, $retorno);   
    return $retorno;  
}


if (isset($_POST['cep'])):
	
	$cep = $_POST['cep'];

	$resultado_busca  = busca_cep($cep);
	$txt ='';

	switch($resultado_busca['resultado']){  
		case '2':  
			$txt = $resultado_busca['cidade'].'-'.$resultado_busca['uf'];
		break;  
		case '1':  
		    $txt = '{'; // "dados": [
			    $txt .= '"tipologradouro": "'. $resultado_busca['tipo_logradouro'] .'",';
				$txt .= '"logradouro": "'. $resultado_busca['logradouro'] .'",';
				$txt .= '"bairro": "'. utf8_encode($resultado_busca['bairro']) .'",';
				$txt .= '"cidade": "'. utf8_encode($resultado_busca['cidade']) .'",';
				$txt .= '"uf": "'. $resultado_busca['uf'] .'"';  
			$txt .= '}'; // ]
		break;  
		  
		default:  
		    $txt = 'null';
		break;  
	} 	

	echo $txt;

endif;