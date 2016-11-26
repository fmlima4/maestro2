<?php

namespace application\models;

class professorModel extends \model {
	
	public function __construct(){
		parent::__construct();
		$this->_tabela = 'funcionario';
	}

}

?>
