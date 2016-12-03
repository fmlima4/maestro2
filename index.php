  <?php
  
  	session_start();
  	
  	include ('system/system.php');
	require_once ('system/controller.php');
	require_once ('system/model.php');
	require_once ('config.php');
	require_once('system/upload.php');
	
	function __autoload($file){
	
		if(file_exists($file.'.php')){
			require_once ($file.'.php');
		}
	}
	
	$obj = new System();
	$obj->run();
?> 


<?php

//require 'vendor/autoload.php';

/*
$slugifier = new \Slug\slugifier();
$slugifier->setTransliterate(true);

$frase = 'Frase com acentua��o para teste de cria��o de slug';
$slug = $slugifier->slugify($frase);

echo'<b> frase natural: </br>'. $frase."<br/><br/>";
echo'<b> frase com aplica��o slug: </br>'. $slug."<br/><br/>";
*/
?>