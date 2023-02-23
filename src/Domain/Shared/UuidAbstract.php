<?php

declare(strict_types=1);

namespace App\Domain\Shared;

use Ramsey\Uuid\Uuid;

abstract class UuidAbstract
{
    protected string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function __toString(): string
    {
        return $this->id;
    }

    public function id(): string
    {
        return $this->id;
    }

    public static function generate(): static
    {
        try {
            return new static(
                Uuid::uuid4()->toString()
            );
        } catch (\Exception $exception) {
            throw new \RuntimeException('Can not generate ID.');
        }
    }
}
