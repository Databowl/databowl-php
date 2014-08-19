<?php
namespace Databowl\Leads\Data;

class DataCollection implements \Iterator
{
    private $position = 0;
    private $data = [];

    public function __construct()
    {
        $this->position = 0;
    }

    public function exchangeArray(array $data)
    {
        foreach ($data as $key => $value) {
            $dataItem = new DataItem($key, $value);

            $this->data[] = $dataItem;
        }
    }

    public function getArrayCopy()
    {
        $array = [];

        foreach ($this->data as $data) {
            $array[$data->getName()] = $data->getValue();
        }

        return $array;
    }

    public function add(DataItem $dataItem)
    {
        $this->data[] = $dataItem;
    }

    public function current()
    {
        return $this->data[$this->position];
    }

    public function next()
    {
        ++$this->position;
    }

    public function key()
    {
        return $this->position;
    }

    public function valid()
    {
        return isset($this->data[$this->position]);
    }

    public function rewind()
    {
        $this->position = 0;
    }
}