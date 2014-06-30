<?php

/**
 * Created by PhpStorm.
 * User: denis
 * Date: 27/06/14
 */
class XMLDto
{
    private $_text;
    private $_time;

    public function __construct($time, $text)
    {
        $this->setTime($time)
            ->setText($text);
    }

    public function getTime()
    {
        return $this->_time;
    }

    public function getText()
    {
        return $this->_text;
    }

    public function setTime($time)
    {
        $this->_time = $time;
        return $this;
    }

    public function setText($text)
    {
        $this->_text = $text;
        return $this;
    }
}
