<?php

namespace Tagliatelle\Loader;

use RuntimeException;

class CsvDataLoader
{
    public function loadFile($filename, $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename)) {
            throw new RuntimeException("Can't find or read $filename");
        }

        $header = null;
        $data = array();
        
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                if (!$header) {
                    $header = $row;
                } else {
                    $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }
        return $data;
    }
}
