<?php
//webservice de pesquisa
	include "clUsuario.php";
	$chave = md5('projetoapk');
	
	if($_POST['chave']){
		
		if (strcmp($_POST['chave'], $chave) === 0){
			
			if($_POST['id']){
				$usuario = new Usuario();
				$rs = $usuario->PesquisaUsuarioPorId($_POST['id']);
				echo json_encode($rs);
			}else{
				echo "Argumentos insuficientes";
			}
			
		}else{
			
			echo "chave incorreta";
		}
		
	}else{
		
		echo "chave nao fornecida";
		
	}
	
	
	
?>
