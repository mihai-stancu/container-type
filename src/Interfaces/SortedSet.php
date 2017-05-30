<?php

/*
 * Copyright (c) 2017 Mihai Stancu <stancu.t.mihai@gmail.com>
 *
 * This source file is subject to the license that is bundled with this source
 */

namespace MS\ContainerType\Interfaces;

interface SortedSet extends Set
{
    /**
     * @param mixed $element
     *
     * @return bool
     */
    public function has($element);

    /**
     * @param mixed $element
     * @param float $score
     *
     * @return bool
     */
    public function add($element, $score = 0.0);

    /**
     * @param mixed $element
     *
     * @return bool
     */
    public function remove($element);

    /**
     * @param mixed $element
     *
     * @return mixed|mixed[]
     */
    public function head($element = null);

    /**
     * @param mixed $from
     * @param mixed $to
     *
     * @return mixed[]
     */
    public function subset($from, $to);

    /**
     * @param mixed $element
     *
     * @return mixed|mixed[]
     */
    public function tail($element = null);
}
