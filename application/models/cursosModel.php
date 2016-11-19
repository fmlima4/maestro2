<?php

namespace application\models;

class cursosModel extends \model {
		
	public function select(){
		$this->_tabela = "curso";
		return $this->read(null,null,null,'id ASC');
	}
	
}

?>