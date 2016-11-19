<?php
 	class controller extends System{
 		/*private $layout;
 		
 		public function __construct(){
 			$this -> setLayout('index');
 		}*/
 		protected function loadView($nome, $var = array()){
 			ob_start();
 			if(is_array($var) && count($var) > 0){
 				extract($var, EXTR_PREFIX_ALL, 'view');
 			}
 			require_once ('application/views/'. $nome.'.phtml');
 			$conteudo = ob_get_contents();
 			ob_end_clean();
 			
 			ob_start();
 			require_once ('public/layout/layout.php');
 			$layout = ob_get_contents();
 			ob_end_clean();
 			echo str_replace('{{{content}}}',$conteudo,$layout);
 		}
 		/*public function seLayout($layout){
 			$this->layout = $layout;
 		}*/
 	}
 
?>