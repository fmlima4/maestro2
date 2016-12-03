<?php

namespace application\controllers;

	class dashboard extends \controller{
		public function index(){
			$data['pagina'] = parent::getController();
			$dashboard = new \application\models\dashboardModel();
			$dashboard_lista = $dashboard->select();
			$data['dashboard'] = $dashboard_lista;
			$this->loadView('index',$data);
			
		}
		
	
		public function cursos(){
			$data['pagina'] = parent::getController();
			$cursos = new\application\controllers\cursos();
			$cursos_lista = $cursos->adicionar();
			$data['cursos'] = $cursos_lista;
			$this->loadView('index',$data);
			}
							
	}
?>