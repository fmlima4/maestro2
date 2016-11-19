<?php

	namespace application\controllers;
	
	class cursos extends \controller{
	
		public function listar(){
			$cursos = new \application\models\cursosModel();
			$cursos_lista = $cursos->select();
			
			$data['cursos'] = $cursos_lista;
			
			$this->loadView('cursos_lista',$data);
		}
			
		public function adicionar(){
			echo 'teste';
		}
		
		
		
	}

?>