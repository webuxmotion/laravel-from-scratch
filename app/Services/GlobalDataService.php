<?php

namespace App\Services;

class GlobalDataService
{
    protected $data = [];

    // Get data
    public function getData()
    {
        return $this->data;
    }

    public function get($key)
    {
        return $this->data[$key] ?? null;
    }

    // Set data
    public function setData($key, $value)
    {
        $this->data[$key] = $value;
    }
}