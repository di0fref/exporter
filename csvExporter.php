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
abstract class csvExporter extends ExporterBase implements ExporterInterface {

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
	 * @param string $enclosure
	 * @return void
	 */
	public function setEnclosure($enclosure)
	{
		$this->enclosure = $enclosure;
	}

	/**
	 * @param string $enclosure
	 * @return void
	 */
	public function setDelimiter($delimiter)
	{
		$this->delimiter = $delimiter;
	}

	/**
	 * Outputs the result if the export
	 * @param
	 * @return void
	 */
	public function output($filename = "")
	{
		if (!$filename) {
			throw new Exception(__CLASS__."::No file name set.");
		}
		ob_clean();
		header("Pragma: cache");
		header("Content-type: application/octet-stream; charset=" . $GLOBALS['locale']->getExportCharset());
		header("Content-Disposition: attachment; filename={$filename}.csv");
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
	 * @return string CSV
	 */
	public function getResult(array $data, array $header)
	{
		$csv = "";

		if (!isset($this->delimiter) or !isset($this->enclosure)) {
			throw new Exception(__CLASS__."::Delimiter and Enclosure needs to be set.");
		}

		if (isset($header) and is_array($header)) {
			$csv .= implode($this->delimiter, $header) . "\n";
		}

		foreach ($data as $line) {
			$csv .= $this->enclosure . implode($this->enclosure . $this->delimiter . $this->enclosure, $line) . $this->enclosure . "\n";
		}

		return $csv;
	}

}

?>
