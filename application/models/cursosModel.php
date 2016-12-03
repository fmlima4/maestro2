<?php

namespace application\models;

class cursosModel extends \model {
	public function __construct() {
		parent::__construct ();
		$this->_tabela = 'curso';
	}
	public function select() {
		return $this->read ( null, null, null, 'id ASC' );
	}
	public function insert(array $dados) {
		$campos = implode ( ", ", array_keys ( $dados ) );
		$valores = "'" . implode ( "','", array_values ( $dados ) ) . "'";
		$sql = "INSERT INTO `{$this->_tabela}` ({$campos}) VALUES ({$valores})";
		return parent::query ( $sql );
	}
		
	public function delete( $id) {
		echo $sql = "DELETE FROM `{$this->_tabela}` WHERE id = '$id'";
		return parent::query($sql);
	}
	
	
	
		
}
?>
