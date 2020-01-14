<?php


namespace Framework\Core\Output;

use Framework\Core\Interfaces\DataOutput;
use Spatie\ArrayToXml\ArrayToXml;

class Xml implements DataOutput
{

    /**
     * @param mixed $data
     * @return string
     */
    public static function output($data): string
    {
        return ArrayToXml::convert($data);
    }
}