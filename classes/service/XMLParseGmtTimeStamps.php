<?php

/**
 * Created by PhpStorm.
 * User: denis
 * Date: 27/06/14
 */
class XmlParseGmtTimeStamps extends XmlAbstract
{
    protected $_fileToProcess;

    public function __construct($file,$saveAs = null)
    {
        $this->_timestamps = [];

        $this->_fileName = $saveAs;
        $this->_fileToProcess = $file;
    }

    public function run()
    {
        try {
            $this->parse();
        } catch (exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @throws Exception
     */
    protected function parse()
    {
        date_default_timezone_set('America/Los_Angeles');
        if (!file_exists($this->_fileToProcess)) {
            throw new Exception('file does not exist');
        }

        $xml = new SimpleXMLElement(file_get_contents($this->_fileToProcess));
        foreach ($xml->timestamp as $timestamp) {
            $attr = $timestamp->attributes();
            $year = (int)date('Y', (int)$attr['time']);

            if (!$this->isYearAPrimeNumber($year)) {
                $pstTimeStamp = mktime(13, 0, 0, 6, 30, $year);
                $this->_timestamps[(int)$pstTimeStamp] = new XMLDto($pstTimeStamp, date("Y-m-d H:i:s", $pstTimeStamp));
            }
        }

        krsort($this->_timestamps);
        $this->buildXml($this->_timestamps,'PST');
    }

    /**
     * @desc check if year is a prime number
     * http://www.hashbangcode.com/blog/php-function-detect-prime-number
     * @param $year
     * @return bool
     */
    protected function isYearAPrimeNumber($year)
    {
        //better to use gmp function but it needs to be installed
        $x = sqrt($year);
        $x = floor($x);
        for ($i = 2; $i <= $x; ++$i) {
            if ($year % $i == 0) {
                break;
            }
        }

        if ($x == $i - 1) {
            return true;
        } else {
            return false;
        }
    }
}
