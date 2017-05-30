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
     * @param mixed $items,...
     *
     * @return int
     */
    public function push($items)
    {
        $args = func_get_args();
        array_unshift($args, $this);

        return call_user_func_array('array_push', $args);
    }

    /**
     * @param int $count
     *
     * @return mixed|mixed[]
     */
    public function peek($count = 1)
    {
        if (func_num_args() === 0) {
            return reset($this);
        }

        return array_slice($this, -$count, $count);
    }

    /**
     * @param int $count
     *
     * @return mixed|mixed[]
     */
    public function pop($count = 1)
    {
        if (func_num_args() === 0) {
            return array_pop($this);
        }

        return array_splice($this, -$count, $count);
    }
}
