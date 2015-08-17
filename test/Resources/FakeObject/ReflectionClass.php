<?php

namespace Cekurte\Tdd\Test\Resources\FakeObject;

class ReflectionClass
{
    /**
     * @param string
     */
    private $data = 'fake';

    /**
     * @param mixed $data
     *
     * @return Cekurte\Tdd\Test\Resources\FakeObject\ReflectionClass
     */
    private function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    private function getData()
    {
        return $this->data;
    }
}
