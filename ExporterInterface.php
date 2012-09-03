<?php

/**
 * ExporterInterface
 *
 * @author Fredrik Fahlstad
 * */
interface ExporterInterface {

	public function export();
	public function getResult(array $data, $settings = false);
}

?>