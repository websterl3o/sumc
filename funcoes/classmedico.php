<?php
include_once "functions.php";
	// global $con = mysql_connect("academico.glaubercosta.com:3306","eduardo_lopes","130300001");
	
	class Médico{
		
		var $idMedico;
		var $crm;
		var $especialidade;
		var $idUsuario;
		
		// $dados - array contendo as variáveis para preenchimento da classe
		function Médico($dados){
			
			$this->crm 	 			 = $dados[0];
			$this->especialidade 	 = $dados[1];
		}
		
		function insereMédico($dados){
			
			$this->crm 	 			 = $dados[0];
			$this->especialidade 	 = $dados[1];
			$this->idUsuario 		 = $dados[2];
			
			$sql = "INSERT INTO Médico
					('crm','especialidade','idUsuario')
					VALUES
					('this->crm','$this->especialidade','$this->idUsuario')";
			
			$result = mysql_query($sql);
			return (1);	
		}
		
		function deletaMédico($idMedico){
			
			$sql ="DELETE FROM Médico WHERE $idMedico = $idMedico";
			
			$result = mysql_query($sql);
			return (1);
		}
		
		function pesquisaMédico($idMedico){
			
			$sql ="SELECT * FROM Médico WHERE $idMedico = $idMedico";
			
			$result = mysql_query($sql);
			
			if(mysql_num_rows($result) !=0){
				$dados = $result->fetchRow();
				$this->$idMedico   			  = $dados[0];
				$this->crm		  			  = $dados[1];
				$this->especialidade		  = $dados[2];
				$this->idUsuario  			  = $dados[3];
				return(1);	
			}
			else return (0);
		}
		
		function alteraMédico($idMedico, $dados){
			
			$crm		  		  = $dados[0];
			$especialidade		  = $dados[1];
			$idUsuario    		  = $dados[2];
			
			$sql ="UPDATE Médico SET ('crm','especialidade','idUsuario') VALUES ('$crm', '$especialidade', '$idUsuario') WHERE $idMedico";
			
			$result = mysql_query($sql);
			
			if(mysql_num_rows($result) !=0){
				return (1);
			}
		}
	}
?>