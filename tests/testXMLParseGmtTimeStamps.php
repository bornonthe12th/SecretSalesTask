<?php
require_once('Bootstrap.php');

/**
 * Created by PhpStorm.
 * User: denis
 * Date: 28/06/14
 * Time: 22:36
 */
class testXMLParseGmtTimeStamps extends baseTest
{


    public function setUp()
    {
        $service = new XmlParseGmtTimeStamps(APPLICATION_PATH . '/data/GMT/phpunit.xml','phpunit-test');
        $service->run();
        $this->_file = APPLICATION_PATH . '/data/PST/phpunit-test.xml';
        $this->_expected = new DOMDocument;
        $this->_actual = new DOMDocument;
        $this->_actual->loadXML(file_get_contents($this->_file));
        $this->_expected->loadXML(file_get_contents(APPLICATION_PATH . '/data/PST/phpunit.xml'));
    }

    /**
     * @desc test that structure is identical and count of 45 child elements
     *
     */
    public function testXmlStructure()
    {
        parent::testXmlStructure();
    }

    /**
     * @desc make sure that results are always the same so test at random
     */
    public function testRandomTimeStamps()
    {
        parent::testRandomTimeStamps();
    }

}
