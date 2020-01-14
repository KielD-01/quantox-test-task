<?php


namespace Framework\Core\Interfaces;


use Illuminate\Support\Collection;

interface DataOutput
{

    /**
     * @param mixed $data
     * @return string
     */
    public static function output($data) : string;
}