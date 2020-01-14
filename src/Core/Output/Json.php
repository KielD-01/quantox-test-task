<?php


namespace Framework\Core\Output;


use Framework\Core\Interfaces\DataOutput;
use Illuminate\Support\Collection;

class Json implements DataOutput
{

    /**
     * @param mixed $data
     * @return string
     */
    public static function output($data): string
    {
        return json_encode($data, JSON_PRETTY_PRINT);
    }
}