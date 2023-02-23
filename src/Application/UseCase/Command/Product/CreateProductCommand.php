<?php

namespace App\Application\UseCase\Command\Product;

class CreateProductCommand
{
    public string $id;
    public string $name;
    public int $priceAmount;
    public string $priceCurrency;

    public function __construct(string $id, string $name, int $priceAmount, string $priceCurrency)
    {
        $this->id = $id;
        $this->name = $name;
        $this->priceAmount = $priceAmount;
        $this->priceCurrency = $priceCurrency;
    }
}
