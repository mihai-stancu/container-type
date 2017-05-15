<?php

/*
 * Copyright (c) 2017 Mihai Stancu <stancu.t.mihai@gmail.com>
 *
 * This source file is subject to the license that is bundled with this source
 */

namespace MS\ContainerType\Traits;

trait StackTrait
{
    /**
     * @param mixed $value
     */
    public function push($value)
    {
        array_push($this, $value);
    }

    /**
     * @return mixed
     */
    public function peek()
    {
        return end($this);
    }

    /**
     * @return mixed
     */
    public function pop()
    {
        return array_pop($this);
    }
}
