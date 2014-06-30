<?php
require_once('Bootstrap.php');

/**
 * Created by PhpStorm.
 * User: denis
 * Date: 28/06/14
 * Time: 22:36
 */
class testXmlGenerateGmtTimeStamps extends baseTest
{

    public function setUp()
    {
        $service = new XmlGenerateGmtTimeStamps(2014, 'phpunit-test');
        $service->run();
        $this->_file = APPLICATION_PATH . '/data/GMT/phpunit-test.xml';
        $this->_expected = new DOMDocument;
        $this->_actual = new DOMDocument;
        $this->_actual->loadXML(file_get_contents($this->_file));
        $this->_expected->loadXML(file_get_contents(APPLICATION_PATH . '/data/GMT/phpunit.xml'));
    }

    /**
     * @desc test that structure is identical and count of 45 child elements
     *
     */
    public function testXmlStructure()
    {
        parent::testXmlStructure();
    }


    public function testRandomTimeStamps()
    {
        parent::testRandomTimeStamps();
    }

}
