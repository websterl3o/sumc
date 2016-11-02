<?php

	global $con = mysql_connect("academico.glaubercosta.com:3306","eduardo_lopes","130300001");
	
	class convenio{
		
		var $idConvenio;
		var $cnpj;
		var $nome;
		var $descricao;
		
		// $dados - array contendo as variáveis para preenchimento da classe
		function convenio($dados){
			
			$this->cnpj 	 = $dados[0];
			$this->nome 	 = $dados[1];
			$this->descricao = $dados[2];
		}
		
		function insereConvenio($dados){
			
			$this->cnpj 	 = $dados[0];
			$this->nome 	 = $dados[1];
			$this->descricao = $dados[2];
			
			$sql = "INSERT INTO convenio
					('cnpj','nome','descricao')
					VALUES
					('this->cnpj','$this->nome','$this->descricao')";
			
			$result = mysql_query($sql);
			return (1);	
		}
		
		function deletaConvenio($idConvenio){
			
			$sql ="DELETE FROM convenio WHERE idConvenio = $idConvenio";
			
			$result = mysql_query($sql);
			return (1);
		}
		
		function pesquisaConvenio($idConvenio){
			
			$sql ="SELECT * FROM convenio WHERE idConvenio = $idConvenio";
			
			$result = mysql_query($sql);
			
			if(mysql_num_rows($result) !=0){
				$dados = $result->fetchRow();
				$this->idConvenio = $dados[0];
				$this->cnpj		  = $dados[1];
				$this->nome		  = $dados[2];
				$this->descricao  = $dados[3];
				return(1);	
			}
			else return (0);
		}
		
		function alteraConvenio($idConvenio, $dados){
			
			$cnpj		  = $dados[0];
			$nome		  = $dados[1];
			$descricao    = $dados[2];
			
			$sql ="UPDATE convenio SET ('cnpj','nome','descricao') VALUES ('$cnpj', '$nome', '$descricao') WHERE $idConvenio";
			
			$result = mysql_query($sql);
			
			if(mysql_num_rows($result) !=0){
				return (1);
			}
		}
	}
?>