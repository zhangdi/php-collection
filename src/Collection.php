<?php
/**
 * Copyright (c) 2019. Zhang Di <zhangdi_me@163.com>
 */

namespace ZhangDi\Collections;


use ArrayIterator;
use ZhangDi\Collections\Contracts\CollectionInterface;
use ZhangDi\Collections\Support\ArrayHelper;

class Collection implements CollectionInterface
{
    /**
     * @var array
     */
    protected $items = [];


    /**
     * @inheritDoc
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * @inheritDoc
     */
    public function has($key): bool
    {
        return ArrayHelper::exists($this->items, $key);
    }

    /**
     * @inheritDoc
     */
    public function get($key, $defaultValue = null)
    {
        return ArrayHelper::getValue($this->items, $key, $defaultValue);
    }

    /**
     * @inheritDoc
     */
    public function set($key, $value): void
    {
        $this->items[$key] = $value;
    }

    /**
     * @inheritDoc
     */
    public function remove($key): void
    {
        unset($this->items[$key]);
    }

    /**
     * @inheritDoc
     */
    public function clear(): void
    {
        $this->items = [];
    }

    /**
     * @inheritDoc
     */
    public function getKeys(): array
    {
        return \array_keys($this->items);
    }

    /**
     * @inheritDoc
     */
    public function getValues(): array
    {
        return \array_values($this->items);
    }


    /**
     * @inheritDoc
     */
    public function offsetExists($offset)
    {
        return $this->has($offset);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        $this->set($offset, $value);
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset)
    {
        $this->remove($offset);
    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return new ArrayIterator($this->items);
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return $this->items;
    }

    /**
     * @inheritDoc
     */
    public function serialize()
    {
        return \serialize($this->items);
    }

    /**
     * @inheritDoc
     */
    public function unserialize($serialized)
    {
        return $this->items = \unserialize($serialized);
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return $this->items;
    }

    /**
     * @inheritDoc
     */
    public function toJson(): string
    {
        return \json_encode($this->items);
    }


    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return \json_encode($this->items);
    }
}