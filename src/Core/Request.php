<?php


namespace Framework\Core;


class Request extends Bootstrap
{

    /**
     * @var array
     */
    protected $_get = [];

    /**
     * @var array
     */
    protected $_post = [];

    /**
     * @var array
     */
    protected $_files = [];

    public function __construct()
    {
        $this->_get = $_GET;
        $this->_post = $_POST;
        $this->_files = $_FILES;
    }

    /**
     * @param string $key
     * @param null $default
     * @return mixed|null
     */
    public function get(string $key, $default = null)
    {
        return $this->_get[$key] ?? $default;
    }

    /**
     * @param string $key
     * @param null $default
     * @return mixed|null
     */
    public function post(string $key, $default = null)
    {
        return $this->_post[$key] ?? $default;
    }
}