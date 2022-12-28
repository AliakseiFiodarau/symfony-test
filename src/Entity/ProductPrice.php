<?php

declare(strict_types=1);

namespace App\Entity;

use App\Validator\IsLocaleTax as AppAssert;

class ProductPrice
{
    private ?float $price = null;

    #[AppAssert]
    private ?string $taxNumber = null;

    /**
     * Getter for price.
     *
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * Setter for price.
     *
     * @param float $price
     * @return $this
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Getter for tax number.
     *
     * @return string|null
     */
    public function getTaxNumber(): ?string
    {
        return $this->taxNumber;
    }

    /**
     * Setter for tax number.
     *
     * @param string $taxNumber
     * @return $this
     */
    public function setTaxNumber(string $taxNumber): self
    {
        $this->taxNumber = $taxNumber;

        return $this;
    }
}
