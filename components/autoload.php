<?php

function __autoload($class_name)
{
	$array_paths = array(
			'/models/',
			'/components/'
		);

	foreach ($array_paths as $path) {
		
		$path = ROOT . $path . $class_name . '.php';
		//echo $path . "<br>" ;
		
		if(is_file($path)){
			include_once($path);
		}
	}

}