<?php

/**
 *
 * @param string $type
 * @return exporter
 */
class ExporterFactory {

     public static function getExporter($type)
     {
          $class = $type . 'Exporter';

          if (class_exists($class)) {
               return new $class();
          }
          throw new Exception('Unsupported format');
     }

}

/*
 * Class: ExporterBase
 * Author: Fredrik Fahlstad
 * DRI-Nordic
 *
 */

class ExporterBase {

     var $log;

     public function __construct()
     {
          $this->log = $GLOBALS["log"];
     }

}

/*
 * Interface: exporter
 * Author: Fredrik Fahlstad
 * DRI-Nordic
 *
 */
interface exporter {

     public function export();

     public function output();
}

/*
 * Class: csvExporter
 * Author: Fredrik Fahlstad
 * DRI-Nordic
 *
 */

class csvExporter extends ExporterBase implements exporter {

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
          echo __CLASS__ . "::" . __FUNCTION__;
          $this->output();
     }

     /**
      * Outputs the result if the export
      * @param
      * @return void
      */
     public function output()
     {
          echo __CLASS__ . "::" . __FUNCTION__;
     }

}

/*
 * Class: xmlExporter
 * Author: Fredrik Fahlstad
 * DRI-Nordic
 *
 */

class xmlExporter extends ExporterBase implements exporter {

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
          echo __CLASS__ . "::" . __FUNCTION__;
          $this->output();
     }

     /**
      * Outputs the result if the export
      * @param
      * @return void
      */
     public function output()
     {
          echo __CLASS__ . "::" . __FUNCTION__;
     }

}

$exporter = ExporterFactory::getExporter("xml")->export();
?>
