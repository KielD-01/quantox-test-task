<?php

namespace Framework\Core;


/**
 * Class Controller
 * @package Framework\Core
 * @property Request $request
 */
class Controller
{

    /** @var Request */
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}