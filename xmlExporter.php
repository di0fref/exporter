<?php

/**
 * Exporting SugarCRM data in CSV formats.
 *
 * @author Fredrik Fahlstad
 * @copyright DRI-Nordic 12 July, 2012
 * */
require_once(__DIR__ . "/ExporterBase.php");
require_once(__DIR__ . "/ExporterInterface.php");
require_once(__DIR__ . "/utils/Array2XML.php");

/**
 * csvExporter
 *
 * @author: Fredrik Fahlstad
 */
abstract class xmlExporter extends ExporterBase implements ExporterInterface {

	/**
	 *  @var array
	 */
	var $data;
	var $delimiter;
	var $enclosure;

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Outputs the result if the export
	 * @param
	 * @return void
	 */
	public function output($filename = "")
	{
		if (!$filename) {
			throw new Exception(__CLASS__ . "::No file name set.");
		}
		ob_clean();
		header("Pragma: cache");
		header("Content-type: application/octet-stream; charset=" . $GLOBALS['locale']->getExportCharset());
		header("Content-Disposition: attachment; filename={$filename}.xml");
		header("Content-transfer-encoding: binary");
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . TimeDate::httpTime());
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Content-Length: " . mb_strlen($GLOBALS['locale']->translateCharset($this->csv, 'UTF-8', $GLOBALS['locale']->getExportCharset())));

		print $GLOBALS['locale']->translateCharset($this->csv, 'UTF-8', $GLOBALS['locale']->getExportCharset());
	}

	/**
	 * @param array $data
	 * @param array $settings
	 * @return string XML
	 */
	public function getResult(array $data, $settings = false)
	{
		if(!empty($settings['root_node_name'])){
			throw new Exception(__CLASS__."::No root node name set.");
		}
		$xml = Array2XML::createXML($settings['root_node_name'], $data);
		return $xml->saveXML();
	}

}

?>
