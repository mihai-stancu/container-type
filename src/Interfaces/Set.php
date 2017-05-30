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
     * @param mixed $element
     *
     * @return bool
     */
    public function has($element);

    /**
     * @param mixed $element
     *
     * @return bool
     */
    public function add($element);

    /**
     * @param mixed $element
     *
     * @return bool
     */
    public function remove($element);
}
