<?php

namespace application\models;

class dashboardModel extends \model {
		public function select() {
		$this->_tabela = "usuario";
		return $this->read ( null, null, null, 'id ASC' );
	}
}
?>