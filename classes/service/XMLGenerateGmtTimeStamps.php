<?php

/**
 * Created by PhpStorm.
 * User: denis
 * Date: 27/06/14
 */
class XmlGenerateGmtTimeStamps extends XmlAbstract
{
    const EPOCH_YEAR = 1970;
    protected $_startYear;
    protected $_endYear;

    public function __construct($endYear = null,$fileName = null)
    {
        $this->_fileName = $fileName;
        $this->_startYear = self::EPOCH_YEAR;
        $this->_endYear = is_null($endYear) ? (int)date("Y") : $endYear;
        $this->_timestamps = [];
    }

    public function run()
    {
        $this->generate();
    }

    protected function generate()
    {
        do {
            $timestamp = gmmktime(13, 0, 0, 6, 30, $this->_startYear);
            $dateObject = new DateTime('@' . $timestamp);
            $this->_timestamps[] = new XMLDto($timestamp, $dateObject->format("Y-m-d H:i:s"));
            $this->_startYear++;

        } while ($this->_startYear <= $this->_endYear);

        $this->buildXml($this->_timestamps, 'GMT');
    }

}
