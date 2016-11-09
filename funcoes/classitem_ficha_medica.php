<?php
include_once "functions.php";
class Item_ficha_medica{
	var $idItem_ficha_medica;
	var $dataDiagnostico;
	var $diagnostico;
	var $detalhes;
	var $idConsulta;

		# $dados - array contendo as variáveis para preenchimento da classe
		function Item_ficha_medica($dados){
			
			$this->idItem_ficha_medica 	= $dados[0];
			$this->dataDiagnostico		= $dados[1];
			$this->diagnostico			= $dados[2];
			$this->detalhes				= $dados[3];
			$this->idConsulta			= $dados[4];

		}
		function insereItem_ficha_medica($dados){
			$sql = "
			INSERT INTO Item_ficha_medica ('dataDiagnostico','diagnostico','detalhes','idConsulta') VALUES (
			'$dados->dataDiagnostico 		',
			'$dados->diagnostico	',
			'$dados->detalhes	',
			'$dados->idConsulta			'
			";
			$result = mysql_query($sql);
			return (1);	
		}

		function alteraItem_ficha_medica($idItem_ficha_medica){
			
			$sql = "
			UPDATE Item_ficha_medica SET ('dataDiagnostico','diagnostico','detalhes','idConsulta') VALUES (
			'$dados->dataDiagnostico 		',
			'$dados->diagnostico	',
			'$dados->detalhes	',
			'$dados->idConsulta			'
			)
			WHERE idItem_ficha_medica = '$idItem_ficha_medica'
			";

			$result = mysql_query($sql);
			if(mysql_num_rows($result) !=0){
				return (1);
			}

		}
		function deletaItem_ficha_medica($idItem_ficha_medica){
			$sql = "DELETE FROM Item_ficha_medica WHERE idItem_ficha_medica = '$idItem_ficha_medica'";
			$result = mysql_query($sql);
			return (1);
		}
		function pesquisaItem_ficha_medica($idItem_ficha_medica){
			
			$sql ="SELECT * FROM Item_ficha_medica WHERE idItem_ficha_medica = $idItem_ficha_medica";
			
			$result = mysql_query($sql);
			
			if(mysql_num_rows($result) !=0){
				
				$dados = $result->fetchRow();

				$resultado->idItem_ficha_medica = $dados[0];
				$resultado->dataDiagnostico		= $dados[1];
				$resultado->diagnostico			= $dados[2];
				$resultado->detalhes			= $dados[3];
				$resultado->idConsulta			= $dados[4];
				
				return($resultado);	
			}
		}
}
?>