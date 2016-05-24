<?php 
	class Banco{
		
		function ConectaBanco(){
			try{
				$conn = new PDO("mysql:host=localhost;dbname=db_projetoapk", "root", "");
				return $conn;
			}catch(Exception $e){
				echo $e->getMessage();
				return null;
			}
		}
		
		
	}
?>