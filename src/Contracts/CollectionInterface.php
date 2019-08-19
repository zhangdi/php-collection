<?php
/**
 * Copyright (c) 2019. Zhang Di <zhangdi_me@163.com>
 */

declare(strict_types=1);

namespace ZhangDi\Collections\Contracts;


use ArrayAccess;
use Countable;
use IteratorAggregate;
use JsonSerializable;
use Serializable;
use Traversable;

interface CollectionInterface extends ArrayAccess, Traversable, Countable, IteratorAggregate, JsonSerializable, Serializable
{
    /**
     * @param $key
     * @return bool
     */
    public function has($key): bool;

    /**
     * @param $key
     * @param null $defaultValue
     * @return mixed
     */
    public function get($key, $defaultValue = null);

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value): void;

    /**
     * @param $key
     */
    public function remove($key): void;

    /**
     *
     */
    public function clear(): void;

    /**
     * @return array
     */
    public function getKeys(): array;

    /**
     * @return array
     */
    public function getValues(): array;

    public function toArray(): array;

    /**
     * @return string
     */
    public function toJson():string ;
}