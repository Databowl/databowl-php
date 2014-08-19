<?php
namespace Databowl\Leads\Data;

class DataItem
{
    /**
     * Name of field.
     *
     * @var string
     */
    private $name;
    /**
     * Value of field.
     *
     * @var string
     */
    private $value;

    /**
     * @param string $name
     * @param string $value
     */
    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getValue()
    {
        return $this->value;
    }
}