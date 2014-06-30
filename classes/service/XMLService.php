<?php

/**
 * Created by PhpStorm.
 * User: denis
 * Date: 27/06/14
 */
class XmlService
{

    public static function generateGmtXml($endYear = null,$fileName = null)
    {
        $process = new XmlGenerateGmtTimeStamps($endYear,$fileName);
        $process->run();
    }

    public static function parseXmlToPsTXml($file)
    {
        $process = new XmlParseGmtTimeStamps($file);
        $process->run();
    }
}