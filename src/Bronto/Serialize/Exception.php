<?php

namespace Bronto\Serialize;

/**
 * An exception representative of a serialization problem
 *
 * @author Philip Cali <philip.cali@bronto.com>
 */
class Exception extends \RuntimeException
{
    protected $_thing;
    protected $_input;
    protected $_encoding;

    /**
     * @param string $errorMessage
     * @param int $errorNo
     * @param mixed|string $thingOrInput
     * @param boolean $encoding
     */
    public function __construct($errorMessage, $errorNo, $thingOrInput, $encoding)
    {
        parent::__construct($errorMessage, $errorNo);
        $this->_encoding = $encoding;
        if ($encoding) {
            $this->_thing = $thingOrInput;
        } else {
            $this->_input = $thingOrInput;
        }
    }

    /**
     * Did the exception occured while encoding an object
     *
     * @return boolean
     */
    public function isEncoding()
    {
        return $this->_encoding;
    }

    /**
     * Retrieves the object to be encoded
     *
     * @return mixed
     */
    public function getThing()
    {
        return $this->_thing;
    }

    /**
     * Retrieves the input to be decoded
     *
     * @return string
     */
    public function getInput()
    {
        return $this->_input;
    }
}
