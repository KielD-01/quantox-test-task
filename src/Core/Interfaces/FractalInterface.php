<?php


namespace Framework\Core\Interfaces;


interface FractalInterface
{

    /**
     * @param $mixed
     * @return array
     */
    public static function transform($mixed) : array;
}