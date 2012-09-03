<?php

/**
 * Framework for exporting SugarCRM data in different formats.
 *
 * @author Fredrik Fahlstad
 * @copyright DRI-Nordic 12 July, 2012
 * */

/**
 * ExporterBase
 *
 * @author Fredrik Fahlstad
 * */
class ExporterBase {

	var $log;
	var $request;
	var $db;
	var $bean;
	static $output_types = array(
		"file",
		"browser"
	);

	public function __construct()
	{
		$this->log = $GLOBALS["log"];
		$this->request = $_REQUEST;
		$this->db = $db = DBManagerFactory::getInstance();
	}

	/**
	 * @param string $field
	 * @return mixed
	 */
	public function getRequest($field)
	{
		return $this->request[$field];
	}

	/**
	 * @param SugarBean $bean
	 * @return void
	 */
	public function setBean($bean)
	{
		$this->bean = $bean;
	}

	/**
	 * @param string $filename
	 * @paran string $type (self::output_types)
	 * @return 
	 */
	public function output($filename, $output_type)
	{
		if (!$filename) {
			throw new Exception(__CLASS__ . "::No file name set.");
		}
		if (!$output_type) {
			throw new Exception(__CLASS__ . "::No output type set. See: " . __CLASS__ . "::output_types");
		}
	}

	/**
	 * @param 
	 * @return 
	 */
	public function outputFile($data)
	{
		
	}

	/**
	 * @param 
	 * @return 
	 */
	public function outputBrowser($data)
	{
		
	}

}

?>
