<?php
include_once "functions.php";
class paciente{
	var $idPaciente;
	var $nome;
	var $cpf;
	var $RG;
	var $logadouro;
	var $bairro;
	var $cidade;
	var $estado;
	var $sexo;
	var $ultimaConsulta;
	var $tipoSanguineo;
	var $convenio;

		# $dados - array contendo as variáveis para preenchimento da classe
		/*function paciente($dados){
			
			$this->idPaciente       = $dados[0];
			$this->nome             = $dados[1];
			$this->cpf              = $dados[2];
			$this->RG               = $dados[3];
			$this->logadouro        = $dados[4];
			$this->bairro           = $dados[5];
			$this->cidade           = $dados[6];
			$this->estado           = $dados[7];
			$this->sexo             = $dados[8];
			$this->ultimaConsulta   = $dados[9];
			$this->tipoSanguineo	= $dados[10];
			$this->convenio         = $dados[11];

		}*/
		function inserePaciente($dados){
			$sql = "
			INSERT INTO paciente ('nome', 'cpf', 'RG', 'logadouro', 'bairro', 'cidade', 'estado', 'sexo', 'ultimaConsulta', 'tipoSanguineo','convenio') VALUES (
			'$dados->idPaciente    ',
			'$dados->nome          ',
			'$dados->cpf           ',
			'$dados->RG            ',
			'$dados->logadouro     ',
			'$dados->bairro        ',
			'$dados->cidade        ',
			'$dados->estado        ',
			'$dados->sexo          ',
			'$dados->ultimaConsulta',
			'$dados->tipoSanguineo ',
			'$dados->convenio      ')
			";
			$result = mysql_query($sql);
			return (1);	
		}

		function alteraPaciente($idPaciente){
			
			$sql = "
			UPDATE paciente SET ('nome', 'cpf', 'RG', 'logadouro', 'bairro', 'cidade', 'estado', 'sexo', 'ultimaConsulta', 'tipoSanguineo','convenio') VALUES (
			'$dados->nome          ',
			'$dados->cpf           ',
			'$dados->RG            ',
			'$dados->logadouro     ',
			'$dados->bairro        ',
			'$dados->cidade        ',
			'$dados->estado        ',
			'$dados->sexo          ',
			'$dados->ultimaConsulta',
			'$dados->tipoSanguineo ',
			'$dados->convenio      ')
			WHERE idPaciente = '$idPaciente'
			";

			$result = mysql_query($sql);
			if(mysql_num_rows($result) !=0){
				return (1);
			}

		}
		function deletaPaciente($idPaciente){
			$sql = "DELETE FROM paciente WHERE idPaciente = '$idPaciente'";
			$result = mysql_query($sql);
			return (1);
		}
		
		function pesquisaPaciente($idPaciente){
			$mysqli = new mysqli('localhost', 'root', '','sumc');
			$sql ="SELECT * FROM paciente WHERE idPaciente = $idPaciente";
			
			$result = $mysqli->query($sql);
			
			if(mysqli_num_rows($result) !=0){
				
				$dados = $result->fetch_array();
				$resultado['idPaciente']		=$dados[0];
				$resultado['nome']				=$dados[1];
				$resultado['cpf']				=$dados[2];
				$resultado['RG']				=$dados[3];
				$resultado['logadouro']			=$dados[4];
				$resultado['bairro']			=$dados[5];
				$resultado['cidade']			=$dados[6];
				$resultado['estado']			=$dados[7];
				$resultado['sexo']				=$dados[8];
				$resultado['ultimaConsulta']	=$dados[9];
				$resultado['tipoSanguineo']		=$dados[10];
				$resultado['convenio']			=$dados[11];
				
				return($resultado);	
			}
		}
		
		function todosPacientes(){
			$mysqli = new mysqli('localhost', 'root', '','sumc');
			
			$sql="SELECT idPaciente FROM paciente WHERE 1";
			
			$result = $mysqli->query($sql);
			$i=0;
			while ($row = $result->fetch_array()) {
				$paciente = new paciente();
				$paciente->pesquisaPaciente($row['idPaciente']);
				$vet[$i] = $paciente;
				$i++;
			}
			return $vet;
		}
}  
?>