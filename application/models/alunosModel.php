<?php
namespace application\models;

class alunosModel extends \model {
	public function __construct() {
		parent::__construct ();
		$this->_tabela = 'alunos';
	}
	public function select() {
		return $this->read ( null, null, null, 'id ASC' );
	}
}
?>