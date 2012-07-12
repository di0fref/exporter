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

	public function __construct()
	{
		$this->log = $GLOBALS["log"];
	}

}

?>
