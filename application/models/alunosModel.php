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
	
	public function delete( $id) {
		echo $sql = "DELETE FROM `{$this->_tabela}` WHERE id = '$id'";
		return parent::query($sql);
	}
	
	public function search($termo){
		return $this->read ( "nome LIKE '%{$termo}%'", null, null, 'id ASC' );
	}
}
?>