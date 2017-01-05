<?php

namespace application\controllers;

class professor extends \controller {
	
	public function listar() {
		if (isset ( $_SESSION ['mensagem'] )) {
			$data ['mensagem'] = $_SESSION ['mensagem'];
			unset ( $_SESSION ['mensagem'] );
		}
		
		$data ['pagina'] = parent::getController ();
		$professor = new \application\models\professorModel ();
		$professor_lista = $professor->select ();
		$data ['professor'] = $professor_lista;
		$this->loadView ( 'professor_lista', $data );
	}
	
	public function adicionar() {
		$data ['pagina'] = parent::getController ();
		if (isset ( $_POST ['btsalvar'] )) {
			
			// capturar dados do formulario
			$dadosFormulario = array ();
			$dadosFormulario ['funcionario'] = $_POST ['funcionario'] ?? '';
			$dadosFormulario ['funcao'] = $_POST ['funcao'] ?? '';
			$dadosFormulario ['ativo'] = $_POST ['ativo'] ?? '';
			$dadosFormulario ['id_usuario'] = $_POST ['id_usuario'] ?? '';
			
			// 1 - instanciar o model
			$professorModel = new \application\models\professorModel ();
			$professorModel->insert ( $dadosFormulario );
		}
		
		$this->loadView ( 'professor_adicionar' );
	}
		
	public function deletar() {
		$data ['pagina'] = parent::getController ();
		// capturar o ID
		$id = parent::getParam ( 'id' );
		$professor = new \application\models\professorModel ();
		$professor_lista = $professor->delete ( $id );
		$data ['professor'] = $professor_lista;
		$this->loadView ( 'professor_del', $data );
	}
	
	public function visualizar() {
		$data ['pagina'] = parent::getController ();
		$id = parent::getParam ( 'id' );
		$professorModel = new \application\models\professorModel ();
		$data = $professorModel->readById ( $id );
		$data ['professores'] = $professorModel->read ();
		$this->loadView ( 'professor_visualizar', $data );
	}
	
	public function editar() {
		$data ['pagina'] = parent::getController ();
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
			$_SESSION ['mensagem'] = array (
					'type' => 'success',
					'info' => 'Editado com sucesso'
			);
				
			header ( 'location: /maestro2/professor/listar' );
			
		}
		
		$this->loadView ( 'professor_adicionar', $data );
	}
		
	public function pesquisar() {
		if (isset ( $_SESSION ['mensagem'] )) {
			$data ['mensagem'] = $_SESSION ['mensagem'];
			unset ( $_SESSION ['mensagem'] );
		}
		
		$data ['pagina'] = parent::getController ();
		
		// Recebe o POST['search']
		$professor = new \application\models\professorModel ();
		$data ['termo'] = $_POST ['search'] ?? null;
		$professor_lista = $professor->search ( $data ['termo'] );
		$data ['funcionario'] = $professor_lista;
		
		$this->loadView ( 'professor_lista', $data );
	}
}
?>