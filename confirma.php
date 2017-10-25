<?php
//BUSCANDO AS CLASSES
include_once "classes/Funcionario.class.php";

	
	$objFunc = new Funcionario();
        
        $key = $_GET['key'];
        $objFunc->desbloqueaConta($key);
             

	
