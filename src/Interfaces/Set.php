<?php

/*
 * Copyright (c) 2017 Mihai Stancu <stancu.t.mihai@gmail.com>
 *
 * This source file is subject to the license that is bundled with this source
 */

namespace MS\ContainerType\Interfaces;

interface Set
{
    /**
     * @return bool
     */
    public function empty();

    /**
     * @return mixed
     */
    public function count();

    /**
     * @param mixed $element
     *
     * @return bool
     */
    public function has($element);

    /**
     * @param mixed $element
     */
    public function add($element);

    /**
     * @param mixed
     * @param mixed $element
     */
    public function remove($element);
}
