<?php
/**
 * Created by PhpStorm.
 * User: denis
 * Date: 29/06/14
 * Time: 14:31
 */

abstract class baseTest extends PHPUnit_Framework_TestCase{

    protected $_file;
    protected $_actual;
    protected $_expected;

    /**
     * @desc test that structure is identical and count of 45 child elements
     *
     */
    public function testXmlStructure()
    {
        $expectedTimestamps = $this->_expected->getElementsByTagName('timestamps');
        $actualTimestamps = $this->_actual->getElementsByTagName('timestamps');
        /**
         * @var DOMNodeList $expectedTimestamps
         * @var DOMNodeList $actualTimestamps
         */

        $expected = $expectedTimestamps->item(0);
        $actual = $actualTimestamps->item(0);
        /**
         * @var DOMElement $expected
         * @var DOMElement $actual
         */
        $this->assertEqualXMLStructure($expected, $actual);
    }

    public function testRandomTimeStamps()
    {
        $random = rand(0, 44);
        $expectedTimestamps = $this->_expected->getElementsByTagName('timestamp');
        $actualTimestamps = $this->_actual->getElementsByTagName('timestamp');
        /**
         * @var DOMNodeList $expectedTimestamps
         * @var DOMNodeList $actualTimestamps
         */
        $expected = $expectedTimestamps->item($random)->attributes;
        $actual = $actualTimestamps->item($random)->attributes;
        /**
         * @var DOMNamedNodeMap $expected
         * @var DOMNamedNodeMap $actual
         */
        $this->assertEquals($expected->getNamedItem('text')->nodeValue, $actual->getNamedItem('text')->nodeValue);
        $this->assertEquals($expected->getNamedItem('time')->nodeValue, $actual->getNamedItem('time')->nodeValue);
    }


    public function tearDown()
    {
        unlink($this->_file);
    }

}