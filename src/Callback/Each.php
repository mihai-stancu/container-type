<?php

/*
 * Copyright (c) 2017 Mihai Stancu <stancu.t.mihai@gmail.com>
 *
 * This source file is subject to the license that is bundled with this source
 */

namespace MS\ContainerType\Callback;

class Each
{
    /** @var string */
    protected $method;

    /** @var array|mixed[] */
    protected $arguments;

    /**
     * @param array|string  $method
     * @param array|mixed[] $arguments
     */
    public function __construct($method, array $arguments = [])
    {
        $this->method = $method;
        $this->arguments = $arguments;
    }

    /**
     * @param mixed  $value
     * @param string $key
     *
     * @return array
     */
    public function __invoke($value, $key)
    {
        return call_user_func_array([$value, $this->method], $this->arguments);
    }
}
