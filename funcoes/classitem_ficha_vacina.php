<?php
require_once './functions.php';
class Item_ficha_vacina{
	var $idItem_ficha_vacina;
	var $data_vacina;
	var $descricao_vacina;
	var $idConsulta;

		# $dados - array contendo as variáveis para preenchimento da classe
		function Item_ficha_vacina($dados){
			
			$this->idItem_ficha_vacina 	= $dados[0];
			$this->data_vacina			= $dados[1];
			$this->descricao_vacina		= $dados[2];
			$this->idConsulta			= $dados[3];

		}
		function insereItem_ficha_vacina($dados){
			$sql = "
			INSERT INTO Item_ficha_vacina ('data_vacina','descricao_vacina','idConsulta') VALUES (
			'$dados->data_vacina 		',
			'$dados->descricao_vacina	',
			'$dados->idConsulta			',
			";
			$result = mysql_query($sql);
			return (1);	
		}

		function alteraItem_ficha_vacina($idItem_ficha_vacina){
			
			$sql = "
			UPDATE Item_ficha_vacina SET ('data_vacina','descricao_vacina','idConsulta') VALUES (
			'$dados->data_vacina 		',
			'$dados->descricao_vacina	',
			'$dados->idConsulta			',
			)
			WHERE idItem_ficha_vacina = '$idItem_ficha_vacina'
			";

			$result = mysql_query($sql);
			if(mysql_num_rows($result) !=0){
				return (1);
			}

		}
		function deletaItem_ficha_vacina($idItem_ficha_vacina){
			$sql = "DELETE FROM Item_ficha_vacina WHERE idItem_ficha_vacina = '$idItem_ficha_vacina'";
			$result = mysql_query($sql);
			return (1);
		}
		function pesquisaItem_ficha_vacina($idItem_ficha_vacina){
			
			$sql ="SELECT * FROM Item_ficha_vacina WHERE idItem_ficha_vacina = $idItem_ficha_vacina";
			
			$result = mysql_query($sql);
			
			if(mysql_num_rows($result) !=0){
				
				$dados = $result->fetchRow();
				$resultado->idItem_ficha_vacina	= $dados[0];
				$resultado->data_vacina			= $dados[1];
				$resultado->descricao_vacina	= $dados[2];
				$resultado->idConsulta			= $dados[3];
				
				return($resultado);	
			}
		}
}
?>