<?php

/**
 * @example $exporter = ExporterFactory::getExporter(<type>)->export();
 * @param string $type
 * @return exporter
 */
class ExporterFactory {

	public static function getExporter($type)
	{
		$class = $type . 'Exporter';
		if (self::loadClassFile($class) && class_exists($class)) {
			return new $class();
		}
		throw new Exception("Unsupported format: $type");
	}

	/**
	 * @param 
	 * @return 
	 */
	public static function loadClassFile($class)
	{
	
		$file = __DIR__ . "/" . $class . ".php";
		
		if ((require_once($file)) != 1) {
			throw new Exception("No such file: $file");
		}
		return true;
	}

}

?>
