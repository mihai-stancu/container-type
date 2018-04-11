<?php

/*
 * Copyright (c) 2017 Mihai Stancu <stancu.t.mihai@gmail.com>
 *
 * This source file is subject to the license that is bundled with this source
 */

namespace MS\ContainerType\Traits;

use MS\ContainerType\Interfaces\Collection;

/**
 * A more flexible replacement for array_map / array_walk / array_reduce and any other callback-based processing.
 *
 * @property \ArrayAccess $storage
 */
trait CollectionTrait
{
    /**
     * @param string $key
     *
     * @return bool
     */
    public function has($key)
    {
        return isset($this[$key]);
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function get($key)
    {
        if ($this->has($key)) {
            return $this[$key];
        }
    }

    /**
     * @param string $key
     * @param mixed  $value
     */
    public function add($key, $value)
    {
        if (!$this->has($key)) {
            $this[$key] = $value;
        }
    }

    /**
     * @param string $key
     * @param mixed  $value
     */
    public function set($key, $value)
    {
        $this[$key] = $value;
    }

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return bool
     */
    public function replace($key, $value)
    {
        if ($this->has($key)) {
            $this[$key] = $value;

            return true;
        }

        return false;
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function remove($key)
    {
        unset($this[$key]);
    }

    /**
     * @return mixed
     */
    public function first()
    {
        return reset($this);
    }

    /**
     * @return mixed
     */
    public function last()
    {
        return end($this);
    }

    /**
     * @return array|string[]
     */
    public function keys()
    {
        return array_keys($this->getArrayCopy());
    }

    /**
     * @return array|mixed[]
     */
    public function values()
    {
        return array_values($this->getArrayCopy());
    }

    /**
     * @param array|string $callback
     * @param string       $output
     *
     * @return array|\ArrayAccess|static
     */
    public function walk($callback, $output = null)
    {
        if ($output === null) {
            $output = clone $this;
            $output->exchangeArray([]);
        } elseif (is_string($output) and class_exists($output)) {
            $output = new $output();
        }

        foreach ($this as $key => $value) {
            $output[$key] = $callback($value, $key);
        }

        return $output;
    }

    /**
     * @param array|string $callback
     *
     * @return mixed
     */
    public function reduce($callback)
    {
        $result = null;
        foreach ($this as $key => $value) {
            $result = $callback($value, $key);
        }

        return $result;
    }

    /**
     * @param array|string $callback
     *
     * @return static
     */
    public function filter($callback = null)
    {
        $callback = $callback ?: [$this, 'valueIsEmpty'];
        $output = clone $this;
        $output->exchangeArray([]);

        foreach ($this as $key => $value) {
            if ($callback($value, $key)) {
                $output[$key] = $value;
            }
        }

        return $output;
    }

    /**
     * @param Collection|\ArrayAccess[] $collections,...
     *
     * @return static
     */
    public function merge($collections = [])
    {
        $collections = func_get_args();

        array_unshift($collections, $this);
        foreach ($collections as &$collection) {
            $collection = (array) $collection;
        }
        unset($collection);

        $merged = call_user_func_array('array_merge', $collections);

        $collections = clone $this;
        $collections->exchangeArray($merged);

        return $collections;
    }

    /**
     * @param $value
     *
     * @return bool
     */
    protected function valueIsEmpty($value)
    {
        return !empty($value);
    }
}
