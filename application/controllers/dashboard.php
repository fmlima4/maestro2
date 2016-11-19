<?php

namespace application\controllers;

	class dashboard extends \controller{
		public function index(){
			$dashboard = new \application\models\dashboardModel();
			$dashboard_lista = $dashboard->select();
			$data['dashboard'] = $dashboard_lista;
			$this->loadView('index',$data);
			
		}
		
	
		public function cursos(){
			$cursos = new\application\controllers\cursos();
			$cursos_lista = $cursos->adicionar();
			$data['cursos'] = $cursos_lista;
			$this->loadView('index',$data);
			}
							
	}
?>