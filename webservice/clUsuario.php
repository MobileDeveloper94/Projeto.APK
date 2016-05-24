<?php
/**
	Classe de usuario, funcões de cadastro e 
		edição de usuários estarão presentes nesta classe.
**/

	//include da classe banco
	
	include "clBanco.php";

	class Usuario extends Banco{

	//atributos da classe
	
		private $id;//int
		private $nome;//string
		private $email;//string
		private $senha;//string
		private $ativo;//boolean
		private $cpf;//string
		private $telefone;//string
		
		
	//getters e setters	
	
		function getId(){
			return $this->$id;
		}
		
		function setId($id){
			$this->$id = $id;
		}
		
		function getNome(){
			return $this->$nome;
		}
		
		function setNome($nome){
			$this->$nome = $nome;
		}
		
		function getEmail(){
			return $this->$email;
		}
		
		function setEmail($email){
			$this->$email = $email;
		}
		
		function getSenha(){
			return $this->$senha;
		}
		
		function setSenha($senha){
			$this->$senha = $senha;
		}
		
		function getAtivo(){
			return $this->$ativo;
		}
		
		function setAtivo($ativo){
			$this->$ativo = $ativo;
		}
		
		function getCpf(){
			return $this->$cpf;
		}
		
		function setCpf($cpf){
			$this->$cpf = $cpf;
		}
		
		function getTelefone(){
			return $this->$telefone;
		}
		
		function setTelefone($telefone){
			$this->$telefone = $telefone;
		}
		
		// funcao que recebe os dados do usuario e insere no Banco
		// retorna 1 em caso de sucesso e null em caso de erro
		function CadastraUsuario($nome,$email,$senha){
			
			try{
				$conn = Banco::ConectaBanco();
				$statm = $conn->prepare(
					"INSERT INTO Usuario(usuario_nome,usuario_email,usuario_senha)
						VALUES(:nome,:email,:senha)
					"
				);
				$statm->bindValue(":nome",$nome);
				$statm->bindValue(":email",$email);
				$statm->bindValue(":senha",$senha);
				$conn = NULL;
				return $statm->execute();
			}catch(Exception $e){
				echo $e->getMessage();
				return null;
			}
			
		}
		
		//funcao de pesquisa de usuarios ativos pelo ID. Recebe id e retorna um Array com os dados do usuario
		function PesquisaUsuarioPorId($id){
			
			try{
				$conn = Banco::ConectaBanco();
				$statm = $conn->prepare("SELECT * FROM Usuario WHERE usuario_id = :id AND usuario_ativo = TRUE");
				$statm->bindValue(":id", $id);
				$statm->execute();
				$conn = NULL;
				return $row = $statm->fetch(PDO::FETCH_ASSOC);
			}catch(Exception $e){
				echo $e->getMessage();
				return null;
			}
			
		}
		
		//funcao para deletar, apenas marca o flag ativo como FALSE
		function inativaUsuario($id){
			try{
				$conn = Banco::ConectaBanco();
				$statm = $conn->prepare(
				"UPDATE Usuario
					SET usuario_ativo = FALSE
					WHERE usuario_id = :id AND usuario_ativo = TRUE
				");
				$statm->bindValue(":id", $id);
				$conn = NULL;
				return $statm->execute();
			}catch(Exception $e){
				echo $e->getMessage();
				return null;
			}
			
		} 
	}
?>