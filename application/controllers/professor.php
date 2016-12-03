<?php

namespace application\controllers;

class professor extends \controller {
	public function listar() {
		$professor = new \application\models\professorModel ();
		$professor_lista = $professor->select ();
		$data ['professor'] = $professor_lista;
		$this->loadView ( 'professor_lista', $data );
	}
	public function adicionar() {
		if (isset ( $_POST ['btsalvar'] )) {
			
			// capturar dados do formulario
			$dadosFormulario = array ();
			$dadosFormulario ['funcionario'] = $_POST ['funcionario'] ?? '';
			$dadosFormulario ['funcao'] = $_POST ['funcao'] ?? '';
			$dadosFormulario ['ativo'] = $_POST ['ativo'] ?? '';
			
						
			
			/*if (isset($dadosFormulario ['id_usuario']) && !empty($dadosFormulario ['id_usuario']))
			echo "preencha corretamente id_usuario";
			else*/
			$dadosFormulario ['id_usuario'] = $_POST ['id_usuario'] ?? '';
			
			
			
			// 1 - instanciar o model
			$professorModel = new \application\models\professorModel ();
			$professorModel->insert ( $dadosFormulario );
		}
		
		$this->loadView ( 'professor_adicionar' );
	}
	public function deletar() {
		
		// capturar o ID
		$id = parent::getParam ( 'id' );
		$professor = new \application\models\professorModel ();
		$professor_lista = $professor->delete ( $id );
		$data ['professor'] = $professor_lista;
		$this->loadView ( 'professor_del', $data );
	}
	public function visualizar() {
		$id = parent::getParam ( 'id' );
		$professorModel = new \application\models\professorModel ();
		$data = $professorModel->readById ( $id );
		$data ['professores'] = $professorModel->read ();
		$this->loadView ( 'professor_visualizar', $data );
	}
	public function editar() {
		
		// capturar o ID
		$id = parent::getParam ( 'id' );
		
		$professorModel = new \application\models\professorModel ();
		$data = $professorModel->readById ( $id );
		
		if (isset ( $_POST ['btsalvar'] )) {
			
			// capturar dados do formulario
			$dadosFormulario = array ();
			$dadosFormulario ['funcionario'] = $_POST ['funcionario'] ?? '';
			$dadosFormulario ['funcao'] = $_POST ['funcao'] ?? '';
			$dadosFormulario ['ativo'] = $_POST ['ativo'] ?? '';
			$dadosFormulario ['id_usuario'] = $_POST ['id_usuario'] ?? '';
			
			// 1 - instanciar o model
			$professorModel = new \application\models\professorModel ();
			$professorModel->update ( $dadosFormulario, "id='$id'" );
		}
		
		$this->loadView ( 'professor_adicionar', $data );
	}
}

?>