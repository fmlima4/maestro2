<?php
class upload {
	const APP_DIRECTORY = 'data/';
	public $extension = array ();
	public $file;

	public function __construct($arquivo){
		// testa se existe o diretorio se nao existir criar
		if(!file_exists(self::APP_DIRECTORY)){
			mkdir(self::APP_DIRECTORY,0777);
		}
		$this->file = $arquivo;
	}

	public function execute(){
		if(self:: checkextension()){
			if(isset($this->file)){
				echo $name= self::APP_DIRECTORY.uniqid().'_'.$this->file['name'];
				if(is_uploaded_file($this->file['tmp_name'])){
					
					if(move_uploaded_file($this->file['tmp_name'],$name)){
						return $name;
					}else{
						return false;
					}
				}
			}
		}
	}
	
	public function setExtension(array $extension){
		$this->extension = $extension;
	}
	
	public function checkextension(){
		$nome = explode('.',$this->file['name']);
		$extensão=end($nome);
		if(in_array($extensão,$this->extension)){
			return true;
		}else {
			return false;
		}
	}
}
?>