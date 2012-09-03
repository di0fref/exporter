<?php
require __DIR__."/csvExporter.php";
require __DIR__."/xmlExporter.php";

/**
 * @example $exporter = ExporterFactory::getExporter(<type>)->export();
 * @param string $type
 * @return exporter
 */
class ExporterFactory {

	public static function getExporter($type, $bean = false)
	{
		$class = $type . 'Exporter';
		if (self::loadClassFile($class) && class_exists($class)) {
			return new $class($bean);
		}
		throw new Exception("Unsupported format: $type");
	}

	/**
	 * @param 
	 * @return 
	 */
	public static function loadClassFile($class)
	{
		$file = dirname(__DIR__). "/Export/" . $class . ".php";
		if ((require_once($file)) != 1) {
			throw new Exception("No such file: $file");
		}
		return true;
	}

}

?>
