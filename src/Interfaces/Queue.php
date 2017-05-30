<?php

/*
 * Copyright (c) 2017 Mihai Stancu <stancu.t.mihai@gmail.com>
 *
 * This source file is subject to the license that is bundled with this source
 */

namespace MS\ContainerType\Interfaces;

interface Queue
{
    /**
     * @param mixed $items,...
     *
     * @return int
     */
    public function enqueue($items);

    /**
     * @param int $count
     *
     * @return mixed|mixed[]
     */
    public function peek($count = 1);

    /**
     * @param int $count
     *
     * @return mixed|mixed[]
     */
    public function dequeue($count = 1);
}
