<?php
	include "clUsuario.php";
	$chave = md5('projetoapk');
	
	if($_POST['chave']){
		
		if (strcmp($_POST['chave'], $chave) === 0){
			
			if($_POST['nome'] && $_POST['email'] && $_POST['senha']){
				$usuario = new Usuario();
				$rs = $usuario->CadastraUsuario($_POST['nome'], $_POST['email'],$_POST['senha']);
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
