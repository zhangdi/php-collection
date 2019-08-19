<?php
/**
 * Copyright (c) 2019. Zhang Di <zhangdi_me@163.com>
 */

namespace ZhangDi\Collections\Support;


class ArrayHelper
{
    /**
     * @param array $array
     * @param callable $callback
     */
    public static function map(array $array, callable $callback)
    {
        foreach ($array as $item) {
            \call_user_func($callback, $item);
        }
    }

    /**
     * @param array $array
     * @param string|int $key
     * @return bool
     */
    public static function exists(array $array, $key): bool
    {
        return isset($array[$key]) || \array_key_exists($key, $array);
    }

    /**
     * @param array $array
     * @param string|int $key
     * @param mixed|null $defaultValue
     * @return mixed|null
     */
    public static function getValue(array $array, $key, $defaultValue = null)
    {
        if (static::exists($array, $key)) {
            return $array[$key];
        }

        if (($pos = strrpos($key, '.')) !== false) {
            $array = static::getValue($array, substr($key, 0, $pos), $defaultValue);
            $key = substr($key, $pos + 1);
        }
        if (is_array($array)) {
            return static::exists($array, $key) ? $array[$key] : $defaultValue;
        }
        return $defaultValue;
    }
}