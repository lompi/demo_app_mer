<?php

declare(strict_types=1);

namespace App\Application\ReadModel\Lead;

class LeadDetailsReadModel
{
    private string $id;

    /** @var LeadItemReadModel[] */
    private array $items;

    /**
     * @param LeadItemReadModel[] $items
     */
    public function __construct(string $id, array $items)
    {
        $this->id = $id;
        $this->items = $items;
    }

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return LeadItemReadModel[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}
