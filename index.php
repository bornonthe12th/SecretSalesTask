<?php
require_once("Bootstrap.php");

$bootstrap = new Bootstrap();
$bootstrap->autoLoad();

if (isset($argv[1])) {
    if ($argv[1] == '-p') {
        if (isset($argv[2])) {
            XmlService::parseXmlToPsTXml($argv[2]);
        } else {
            echo 'Please pass in a file name' . PHP_EOL;
        }
    } else {
        echo 'Invalid option ' . $argv[1] . PHP_EOL;
    }
} else {
    XmlService::generateGmtXml();
}

