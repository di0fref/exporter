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

	public function __construct()
	{
		$this->log = $GLOBALS["log"];
		$this->request = $_REQUEST;
		$this->db = $db = DBManagerFactory::getInstance();
	}

	/**
	 * @param 
	 * @return 
	 */
	public function getRequest($field)
	{
		return $this->request[$field];
	}
	/**
	 * @param SugarBean $bean
	 * @return 
	 */
	public function setBean($bean)
	{
		$this->bean = $bean;
	}


}

?>
