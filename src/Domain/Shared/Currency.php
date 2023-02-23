<?php

declare(strict_types=1);

namespace App\Domain\Shared;

use Webmozart\Assert\Assert;

class Currency
{
    private const PLN_CODE = 'PLN';
    private const VALID_CODES = [
        self::PLN_CODE,
    ];
    private const PRECISION = [
        self::PLN_CODE => 2,
    ];

    private string $code;
    private int $precision;

    public function __toString(): string
    {
        return $this->code;
    }

    public function __construct(string $code)
    {
        Assert::inArray($code, self::VALID_CODES);
        $this->code = $code;
        $this->precision = self::PRECISION[$code];
    }

    public static function PLN(): self
    {
        return new self(self::PLN_CODE);
    }

    public function equals(self $other): bool
    {
        return $this->code === $other->code;
    }

    public function code(): string
    {
        return $this->code;
    }

    public function precision(): int
    {
        return $this->precision;
    }
}
