<?php

namespace application\controllers;

class alunos extends \controller {
	
	public function listar() {
		if (isset ( $_SESSION ['mensagem'] )) {
			$data ['mensagem'] = $_SESSION ['mensagem'];
			unset ( $_SESSION ['mensagem'] );
		}
		
		$data ['pagina'] = parent::getController ();
		$alunos = new \application\models\alunosModel ();
		$alunos_lista = $alunos->select ();
		$data ['alunos'] = $alunos_lista;
		$this->loadView ( 'alunos_lista', $data );
	}
	
	public function adicionar() {
		$data ['pagina'] = parent::getController ();
		if (isset ( $_POST ['btsalvar'] )) {
			
			// capturar dados do formulario
			$dadosFormulario = array ();
			$dadosFormulario ['nome'] = $_POST ['nome'] ?? '';
			$dadosFormulario ['email'] = $_POST ['email'] ?? '';
			$dadosFormulario ['telefone'] = $_POST ['telefone'] ?? '';
			$dadosFormulario ['endereco'] = $_POST ['endereco'] ?? '';
			$dadosFormulario ['CPF'] = $_POST ['CPF'] ?? '';
			$dadosFormulario ['id_usuario'] = $_POST ['id_usuario'] ?? '';
			
			
			
			
			IF (isset ( $_FILES ["arquivo"] )) {
				/*$dadosFormulario ['file'] = "data/" . $_FILES ["arquivo"] ["name"];
				move_uploaded_file ( $_FILES ['arquivo'] ['tmp_name'], $dadosFormulario ['file'] );*/
				$upload = new \Upload($_FILES['arquivo']);
				$dadosFormulario ['file'] = $upload->execute();
			}
			
			// 1 - instanciar o model
			$alunosModel = new \application\models\alunosModel ();
			$alunosModel->insert ( $dadosFormulario );
		}
		
		$this->loadView ( 'alunos_adicionar' );
	}
	
	public function deletar() {
		$data ['pagina'] = parent::getController ();
		// capturar o ID
		$id = parent::getParam ( 'id' );
		$alunos = new \application\models\alunosModel ();
		$alunos_lista = $alunos->delete ( $id );
		$data ['alunos'] = $alunos_lista;
		$this->loadView ( 'alunos_del', $data );
	}
	
	public function visualizar() {
		$data ['pagina'] = parent::getController ();
		$id = parent::getParam ( 'id' );
		$alunosModel = new \application\models\alunosModel ();
		$data = $alunosModel->readById ( $id );
		$data ['alunos'] = $alunosModel->read ();
		$this->loadView ( 'alunos_vizualizar', $data );
	}
	
	public function editar() {
		$data ['pagina'] = parent::getController ();
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
			
			IF (isset ( $_FILES ["arquivo"] )) {
				/*$dadosFormulario ['file'] = "data/" . $_FILES ["arquivo"] ["name"];
				move_uploaded_file ( $_FILES ['arquivo'] ['tmp_name'], $dadosFormulario ['file'] );*/
				$upload= new \Upload($_FILES['arquivo']);
				$upload->setExtension(array('png','jpg'));
				$dadosFormulario['file'] = $upload->execute();
			} else {
				$dadosFormulario ['file'] = $_POST ['arquivo_existe'] ?? '';
			}
			
			// 1 - instanciar o model
			$alunosModel = new \application\models\alunosModel ();
			$alunosModel->update ( $dadosFormulario, "id='$id'" );
			
			$_SESSION ['mensagem'] = array (
					'type' => 'success',
					'info' => 'Editado com sucesso' 
			);
			
			header ( 'location: /maestro2/alunos/listar' );
		}
		
		$this->loadView ( 'alunos_adicionar', $data );
	}
	
	public function pesquisar() {
		if (isset ( $_SESSION ['mensagem'] )) {
			$data ['mensagem'] = $_SESSION ['mensagem'];
			unset ( $_SESSION ['mensagem'] );
		}
		
		$data ['pagina'] = parent::getController ();
		
		// Recebe o POST['search']
		$alunos = new \application\models\alunosModel ();
		$data ['termo'] = $_POST ['search'] ?? null;
		$alunos_lista = $alunos->search ( $data ['termo'] );
		$data ['alunos'] = $alunos_lista;
		
		$this->loadView ( 'alunos_lista', $data );
	}
}
?>