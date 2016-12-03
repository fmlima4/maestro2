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
			  $dadosFormulario ['foto']="data/".$_FILES["arquivo"]["name"];
			 move_uploaded_file($_FILES['arquivo']['tmp_name'], $dadosFormulario ['foto']);
			}
			
			// 1 - instanciar o model
			$alunosModel = new \application\models\alunosModel ();
			$alunosModel->insert ( $dadosFormulario );
		}
		
		$this->loadView ( 'alunos_adicionar' );
	}
	public function deletar() {
		
		// capturar o ID
		$id = parent::getParam ( 'id' );
		$alunos = new \application\models\alunosModel ();
		$alunos_lista = $alunos->delete ( $id );
		$data ['alunos'] = $alunos_lista;
		$this->loadView ( 'alunos_del', $data );
	}
	public function visualizar() {
		$id = parent::getParam ( 'id' );
		$alunosModel = new \application\models\alunosModel ();
		$data = $alunosModel->readById ( $id );
		$data ['alunos'] = $alunosModel->read ();
		$this->loadView ( 'alunos_vizualizar', $data );
	}
	public function editar() {
		
		// capturar o ID
		$id = parent::getParam ( 'id' );
		
		$alunosModel = new \application\models\alunosModel ();
		$data = $alunosModel->readById ( $id );
		
		if (isset ( $_POST ['btsalvar'] )) {
			
			// capturar dados do formulario
			$dadosFormulario = array ();
			$dadosFormulario ['nome'] = $_POST ['nome'] ?? '';
			$dadosFormulario ['email'] = $_POST ['email'] ?? '';
			$dadosFormulario ['telefone'] = $_POST ['telefone'] ?? '';
			$dadosFormulario ['endereco'] = $_POST ['endereco'] ?? '';
			$dadosFormulario ['CPF'] = $_POST ['CPF'] ?? '';
			$dadosFormulario ['id_usuario'] = $_POST ['id_usuario'] ?? '';
			
			// 1 - instanciar o model
			$alunosModel = new \application\models\alunosModel ();
			$alunosModel->update ( $dadosFormulario, "id='$id'" );
		}
		
		$this->loadView ( 'alunos_adicionar', $data );
	}
}
?>