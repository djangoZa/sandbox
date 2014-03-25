<?php
function __autoload ($class_name)
{
	if (!class_exists($class_name, false)) {
		$class_base_path = dirname(__FILE__);
		$class_file_path = str_replace('_', '/', $class_name) . '.php';
		$full_class_path = $class_base_path . '/' . $class_file_path;
		require($full_class_path);
	}
}