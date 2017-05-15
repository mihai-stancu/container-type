<?php

/*
 * Copyright (c) 2017 Mihai Stancu <stancu.t.mihai@gmail.com>
 *
 * This source file is subject to the license that is bundled with this source
 */

namespace MS\ContainerType\Traits;

trait QueueTrait
{
    /**
     * @param mixed $value
     */
    public function enqueue($value)
    {
        array_push($this, $value);
    }

    /**
     * @return mixed
     */
    public function peek()
    {
        return reset($this);
    }

    /**
     * @return mixed
     */
    public function dequeue()
    {
        return array_shift($this);
    }
}
