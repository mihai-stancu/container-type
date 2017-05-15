<?php

/*
 * Copyright (c) 2017 Mihai Stancu <stancu.t.mihai@gmail.com>
 *
 * This source file is subject to the license that is bundled with this source
 */

namespace MS\ContainerType\Interfaces;

interface Stack
{
    /**
     * @param mixed $element
     */
    public function push($element);

    /**
     * @return mixed
     */
    public function peek();

    /**
     * @return mixed
     */
    public function pop();
}
