<?php

	// global $con = mysql_connect("academico.glaubercosta.com:3306","eduardo_lopes","130300001");
	
	class usuario{
		
		var $idUsuario;
		var $nome;
		var $cpf;
		var $rg;
		var $logradouro;
		var $bairro;
		var $cidade;
		var $estado;
		var $sexo;
		var $email;
		var $login;
		var $password;
		var $tipoUsuario;
		
		// $dados - array contendo as variáveis para preenchimento da classe
		function usuario($dados){
			
			$this->nome 	 	= $dados[0];
			$this->cpf 			= $dados[1];
			$this->rg 	 		= $dados[2];
			$this->logradouro 	= $dados[3];
			$this->bairro 		= $dados[4];
			$this->cidade 	 	= $dados[5];
			$this->estado 	 	= $dados[6];
			$this->sexo 		= $dados[7];
			$this->login 	 	= $dados[8];
			$this->password 	= $dados[9];
			$this->tipoUsuario 	= $dados[10];
			$this->email 	= $dados[11];
		}
		
		function insereUsuario($dados){
			
			$this->nome 	 	= $dados[0];
			$this->cpf 			= $dados[1];
			$this->rg 	 		= $dados[2];
			$this->logradouro 	= $dados[3];
			$this->bairro 		= $dados[4];
			$this->cidade 	 	= $dados[5];
			$this->estado 	 	= $dados[6];
			$this->sexo 		= $dados[7];
			$this->login 	 	= $dados[8];
			$this->password 	= $dados[9];
			$this->tipoUsuario 	= $dados[10];
			$this->email 	= $dados[11];
			
			$sql = "INSERT INTO usuario
					('nome','cpf','rg','logradouro','bairro','cidade','estado','sexo','login','password','tipoUsuario','email')
					VALUES
					('this->nome',
					 '$this->cpf',
					 '$this->rg',
					 'this->logradouro',
					 '$this->bairro',
					 '$this->cidade',
					 'this->estado',
					 '$this->sexo',
					 '$this->login',
					 'this->password',
					 '$this->tipoUsuario',
					 '$this->email')";
			
			$result = mysql_query($sql);
			return (1);	
		}
		
		function deletaUsuario($idUsuario){
			
			$sql ="DELETE FROM usuario WHERE idUsuario = $idUsuario";
			
			$result = mysql_query($sql);
			return (1);
		}
		
		function pesquisaUsuario($idUsuario){
			
			$sql ="SELECT * FROM usuario WHERE idUsuario = $idUsuario";
			
			$result = mysql_query($sql);
			
			if(mysql_num_rows($result) !=0){
				$dados = $result->fetchRow();
				$this->idUsuario	= $dados[0];
				$this->nome 	 	= $dados[1];
				$this->cpf 			= $dados[2];
				$this->rg 	 		= $dados[3];
				$this->logradouro 	= $dados[4];
				$this->bairro 		= $dados[5];
				$this->cidade 	 	= $dados[6];
				$this->estado 	 	= $dados[7];
				$this->sexo 		= $dados[8];
				$this->login 	 	= $dados[9];
				$this->password 	= $dados[10];
				$this->tipoUsuario 	= $dados[11];
				return(1);	
			}
			else return (0);
		}
		
		function alteraUsuario($idUsuario, $dados){
			
			$nome 	 		= $dados[0];
			$cpf 			= $dados[1];
			$rg 	 		= $dados[2];
			$logradouro 	= $dados[3];
			$bairro 		= $dados[4];
			$cidade 	 	= $dados[5];
			$estado 	 	= $dados[6];
			$sexo 			= $dados[7];
			$login 	 		= $dados[8];
			$password 		= $dados[9];
			$tipoUsuario 	= $dados[10];
			
			$sql ="UPDATE usuario SET ('nome','cpf','rg','logradouro','bairro','cidade','estado','sexo','login','password','tipoUsuario') 
				VALUES ('$nome', '$cpf', '$rg','logradouro','bairro','cidade','estado','sexo','login','password','tipoUsuario') WHERE $idUsuario";
			
			$result = mysql_query($sql);
			
			if(mysql_num_rows($result) !=0){
				return (1);
			}
		}
	}
?>