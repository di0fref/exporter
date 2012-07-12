<?php

/**
 * Exporting SugarCRM data in CSV formats.
 *
 * @author Fredrik Fahlstad
 * @copyright DRI-Nordic 12 July, 2012
 * */

require_once(__DIR__ . "/ExporterBase.php");
require_once(__DIR__ . "/ExporterInterface.php");

/**
 * csvExporter
 *
 * @author: Fredrik Fahlstad
 */
class csvExporter extends ExporterBase implements ExporterInterface {

	/**
	 *  @var array
	 */
	var $data;

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Initiate the export
	 * @param
	 * @return void
	 */
	public function export()
	{
		$this->output();
	}

	/**
	 * Outputs the result if the export
	 * @param
	 * @return void
	 */
	public function output()
	{
		echo "<pre>";
		print_r($this);
		echo "</pre>";
	}

}

?>