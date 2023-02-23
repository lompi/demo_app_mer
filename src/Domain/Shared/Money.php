<?php

declare(strict_types=1);

namespace App\Domain\Shared;

/**
 * @method static self PLN(int $amount)
 */
class Money
{
    private int $amount;
    private Currency $currency;

    public function __construct(int $amount, Currency $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function __toString(): string
    {
        return $this->formattedAmount().' '.$this->currency;
    }

    public static function __callStatic(string $name, array $arguments)
    {
        return new self($arguments[0], new Currency($name));
    }

    public function equals(self $other): bool
    {
        if ($this->currency !== $other->currency) {
            throw new \RuntimeException('Compare money with different currencies are not supported.');
        }

        return $this->amount === $other->amount;
    }

    public function amount(): int
    {
        return $this->amount;
    }

    public function formattedAmount(): float
    {
        return $this->amount / 10 ** $this->currency->precision();
    }

    public function currency(): Currency
    {
        return $this->currency;
    }
}
