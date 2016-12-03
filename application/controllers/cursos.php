<?php

namespace application\controllers;

class cursos extends \controller {
	public function listar() {
		$data['pagina'] = parent::getController();
		$cursos = new \application\models\cursosModel ();
		$cursos_lista = $cursos->select ();
		$data ['cursos'] = $cursos_lista;
		$this->loadView ( 'cursos_lista', $data );
	}
	
	public function adicionar() {
		$data['pagina'] = parent::getController();
		$professorModel = new \application\models\professorModel ();
		$data ['professores'] = $professorModel->read ();
		
		if (isset ( $_POST ['btsalvar'] )) {
			
			// capturar dados do formulario
			$dadosFormulario = array ();
			$dadosFormulario ['titulo'] = $_POST ['titulo'] ?? '';
			$dadosFormulario ['descricao'] = $_POST ['descricao'] ?? '';
			$dadosFormulario ['carga_horaria'] = $_POST ['carga_horaria'] ?? '';
			$dadosFormulario ['periodo'] = $_POST ['periodo'] ?? '';
			$dadosFormulario ['professor'] = $_POST ['professor'] ?? '';
			$dadosFormulario ['lotacao'] = $_POST ['lotacao'] ?? '';
			$dadosFormulario ['data_inicio'] = $_POST ['inicio'] ?? '';
			$dadosFormulario ['data_fim'] = $_POST ['fim'] ?? '';
			
			if (! isset ( $dadosFormulario ['data_inicio'] ) or $dadosFormulario ['data_inicio'] == '') {
				$error ['data_inicio'] = 'Informe uma data de inicio';
			} else {
				$dadosFormulario ['data_inicio'] = str_replace ( '/', '-', $dadosFormulario ['data_inicio'] );
				$nova = new \DateTime ( $dadosFormulario ['data_inicio'] );
				$dadosFormulario ['data_inicio'] = $nova->format ( 'Y-m-d' );
			}
			
			if (! isset ( $dadosFormulario ['data_fim'] ) or $dadosFormulario ['data_fim'] == '') {
				$error ['data_fim'] = 'Informe uma data final';
			} else {
				$dadosFormulario ['data_fim'] = str_replace ( '/', '-', $dadosFormulario ['data_fim'] );
				$nova = new \DateTime ( $dadosFormulario ['data_fim'] );
				$dadosFormulario ['data_fim'] = $nova->format ( 'Y-m-d' );
			}
			
			// 1 - instanciar o model
			$cursosModel = new \application\models\cursosModel ();
			$cursosModel->insert ( $dadosFormulario );
		}
		
		$this->loadView ( 'cursos_adicionar', $data );
	}
	
	public function deletar() {
		$data['pagina'] = parent::getController();
		// capturar o ID
		$id = parent::getParam ( 'id' );
		$cursos = new \application\models\cursosModel ();
		$cursos_lista = $cursos->delete ( $id );
		$data ['cursos'] = $cursos_lista;
		$this->loadView ( 'cursos_del', $data );
	}
	public function visualizar() {
		$data['pagina'] = parent::getController();
		$id = parent::getParam ( 'id' );
		$cursosModel = new \application\models\cursosModel ();
		$data = $cursosModel->readById ( $id );
		$professorModel = new \application\models\professorModel ();
		$data ['professores'] = $professorModel->read ();
		$this->loadView ( 'cursos_visualizar', $data );
	}
	
	public function editar(){
		
		$data['pagina'] = parent::getController();
	
		//capturar o ID
		$id = parent::getParam('id');
	
		$cursosModel = new \application\models\cursosModel ();
		$data = $cursosModel->readById($id);
	
		$professorModel = new \application\models\professorModel ();
		$data ['professores'] = $professorModel->read ();
	
		if (isset ( $_POST ['btsalvar'] )) {
	
			// capturar dados do formulario
			$dadosFormulario = array ();
			$dadosFormulario ['titulo'] = $_POST ['titulo'] ?? '';
			$dadosFormulario ['descricao'] = $_POST ['descricao'] ?? '';
			$dadosFormulario ['carga_horaria'] = $_POST ['carga_horaria'] ?? '';
			$dadosFormulario ['periodo'] = $_POST ['periodo'] ?? '';
			$dadosFormulario ['professor'] = $_POST ['professor'] ?? '';
			$dadosFormulario ['lotacao'] = $_POST ['lotacao'] ?? '';
			$dadosFormulario ['data_inicio'] = $_POST ['inicio'] ?? '';
			$dadosFormulario ['data_fim'] = $_POST ['fim'] ?? '';
	
			if (! isset ( $dadosFormulario ['data_inicio'] ) or $dadosFormulario ['data_inicio'] == '') {
				$error ['data_inicio'] = 'Informe uma data de inicio';
			} else {
				$dadosFormulario ['data_inicio'] = str_replace ( '/', '-', $dadosFormulario ['data_inicio'] );
				$nova = new \DateTime ( $dadosFormulario ['data_inicio'] );
				$dadosFormulario ['data_inicio'] = $nova->format ( 'Y-m-d' );
			}
	
			if (! isset ( $dadosFormulario ['data_fim'] ) or $dadosFormulario ['data_fim'] == '') {
				$error ['data_fim'] = 'Informe uma data final';
			} else {
				$dadosFormulario ['data_fim'] = str_replace ( '/', '-', $dadosFormulario ['data_fim'] );
				$nova = new \DateTime ( $dadosFormulario ['data_fim'] );
				$dadosFormulario ['data_fim'] = $nova->format ( 'Y-m-d' );
			}
	
			// 1 - instanciar o model
			$cursosModel = new \application\models\cursosModel ();
			$cursosModel->update ( $dadosFormulario, "id='$id'"  );
		}
	
		$this->loadView ( 'cursos_adicionar', $data );
	}

}




?>
