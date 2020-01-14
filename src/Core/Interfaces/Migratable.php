<?php


namespace Framework\Core\Interfaces;


interface Migratable
{
    public static function create(): string;

    public static function drop(): string;
}