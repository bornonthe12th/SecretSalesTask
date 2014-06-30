<?php

/**
 * Created by PhpStorm.
 * User: denis
 * Date: 27/06/14
 * Time: 21:01
 */
abstract class XmlAbstract
{
    protected $_timestamps;
    protected $_fileName;

    /**
     * @param array $stamps
     * @param string $folder
     * @desc build XML and save
     */
    protected function buildXml(array $stamps, $folder)
    {
        $xml = new DOMDocument('1.0', 'utf-8');
        $xml->preserveWhiteSpace = false;
        $xml->formatOutput = true;
        $timestamps = $xml->createElement('timestamps');

        foreach ($stamps as $dto) {
            $timestamp = $xml->createElement('timestamp');
            /**
             * @var XMLDto $dto
             */
            $time = $xml->createAttribute('time');
            $time->value = $dto->getTime();
            $text = $xml->createAttribute('text');
            $text->value = $dto->getText();
            $timestamp->appendChild($time);
            $timestamp->appendChild($text);
            $timestamps->appendChild($timestamp);
        }
        $xml->appendChild($timestamps);
        $fileName = is_null($this->_fileName) ? date('Y-m-d-H-i') : $this->_fileName;
        $dir = APPLICATION_PATH. '/data/' . $folder . '/' . $fileName.'.xml';
        $status = $xml->save($dir);

        if (!$status) {
            echo 'There was an issue saving the XML file, please check that you have the right permission to save to folder';
        } else {
            echo 'The XML file has been saved to ' . $dir . PHP_EOL;
        }
    }

    protected abstract function  run();

}