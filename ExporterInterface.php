<?php

/**
 * ExporterInterface
 *
 * @author Fredrik Fahlstad
 * */
interface ExporterInterface {

	public function export();
	public function output($filename);
	public function getResult(array $data, array $header);
}

?>