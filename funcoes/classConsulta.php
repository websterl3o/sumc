<?php
include_once "functions.php";
	// global $con = mysql_connect("academico.glaubercosta.com:3306","eduardo_lopes","130300001");
	
	class consulta{
		
		var $idConsulta;
		var $idPaciente;
		var $idMedico;
		var $valida; // Médico validará as informações da consulta, dando como verdade estes dados
		var $peso;
		var $altura;
		
		// $dados - array contendo as variáveis para preenchimento da classe
		function consulta($dados){
			
			$this->idPaciente 	 		= $dados[0];
			$this->idMedico 	 		= $dados[1];
			$this->valida 	 			= $dados[2];
			$this->peso 	 			= $dados[3];
			$this->altura 	 			= $dados[4];
		}
		
		function insereConsulta($dados){
			
			$this->idPaciente 	 		= $dados[0];
			$this->idMedico 	 		= $dados[1];
			$this->valida 		 		= $dados[2];
			$this->peso 		 		= $dados[3];
			$this->altura 		 		= $dados[4];
			
			$sql = "INSERT INTO consulta
					('idPaciente','idMedico','valida','peso','altura')
					VALUES
					('this->idPaciente','$this->idMedico','$this->valida','$this->peso','$this->altura')";
			
			$result = mysql_query($sql);
			return (1);	
		}
		
		function deletaConsulta($idConsulta){
			
			$sql ="DELETE FROM consulta WHERE idConsulta = $idConsulta";
			
			$result = mysql_query($sql);
			return (1);
		}
		
		function pesquisaConsulta($idConsulta){
			
			$sql ="SELECT * FROM consulta WHERE idConsulta = $idConsulta";
			
			$result = mysql_query($sql);
			
			if(mysql_num_rows($result) !=0){
				$dados = $result->fetchRow();
				$this->idConsulta   			  	= $dados[0];
				$this->idPaciente		  			= $dados[1];
				$this->idMedico		  				= $dados[2];
				$this->valida  			  			= $dados[3];
				$this->peso			  				= $dados[4];
				$this->altura			  			= $dados[5];
				return(1);	
			}
			else return (0);
		}
		
		function alteraConsulta($idConsulta, $dados){
			
			$idPaciente		  			= $dados[0];
			$idMedico		  			= $dados[1];
			$valida  			  		= $dados[2];
			$peso			  			= $dados[3];
			$altura			  			= $dados[4];
			
			$sql ="UPDATE medico SET ('idPaciente','idMedico','valida','peso','altura') VALUES ('$idPaciente', '$idMedico', '$valida','$peso','$altura') WHERE $idConsulta";
			
			$result = mysql_query($sql);
			
			if(mysql_num_rows($result) !=0){
				return (1);
			}
		}
	}
?>