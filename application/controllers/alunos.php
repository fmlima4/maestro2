<?php

namespace application\controllers;

class alunos extends \controller {
	public function listar() {
		$alunos = new \application\models\alunosModel ();
		$alunos_lista = $alunos->select ();
		$data ['alunos'] = $alunos_lista;
		$this->loadView ( 'alunos_lista', $data );
	}


	public function adicionar() {
	
	
		if (isset ( $_POST ['btsalvar'] )) {
				
			// capturar dados do formulario
			$dadosFormulario = array ();
			$dadosFormulario ['nome'] = $_POST ['nome'] ?? '';
			$dadosFormulario ['email'] = $_POST ['email'] ?? '';
			$dadosFormulario ['telefone'] = $_POST ['telefone'] ?? '';
			$dadosFormulario ['endereco'] = $_POST ['endereco'] ?? '';
			$dadosFormulario ['CPF'] = $_POST ['CPF'] ?? '';
			$dadosFormulario ['id_usuario'] = $_POST ['id_usuario'] ?? '';
			
			IF(isset($_FILES["arquivo"])){
				$dadosFormulario ['arquivo']="data/".$FILES["arquivo"]["nome"];
				move_upload_file($_FILES['arquivo']['imp_name'],$dadosFormulario ['arquivo']);
			}

				
			// 1 - instanciar o model
			$alunosModel = new \application\models\alunosModel ();
			$alunosModel->insert ( $dadosFormulario );
		}
	
		$this->loadView ( 'alunos_adicionar');
	}
	
	

}
?>