<?php


namespace Framework\Core\Interfaces;


interface Displayable
{
    /**
     * Render a template / layout with data
     *
     * @param string $template
     * @param array $data
     */
    public function display(string $template, array $data = []): void;
}