<?php

declare(strict_types=1);

namespace App\Domain\Shared;

use Webmozart\Assert\Assert;

abstract class CollectionOfObjects implements \Countable, \IteratorAggregate
{
    protected const VALID_ELEMENTS_INSTANCES_OF = [];

    protected array $items = [];

    public function __construct(array $items)
    {
        foreach ($items as $item) {
            $this->addElement($item);
        }
    }

    public function items(): array
    {
        return $this->items;
    }

    public function addElement($item): void
    {
        Assert::isInstanceOfAny($item, static::VALID_ELEMENTS_INSTANCES_OF);

        $this->items[] = $item;
    }

    public function removeElement($itemToRemove): void
    {
        foreach ($this->items as $key => $item) {
            if ($item === $itemToRemove) {
                unset($this->items[$key]);
            }
        }
    }

    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->items);
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function toArray(): array
    {
        return $this->items;
    }
}
