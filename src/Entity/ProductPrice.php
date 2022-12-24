<?php

declare(strict_types=1);

namespace App\Entity;

use App\Validator\IsLocaleTax as AppAssert;

class ProductPrice
{
    private ?float $Price = null;

    #[AppAssert]
    private ?string $TaxNumber = null;

    /**
     * Getter for price.
     *
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->Price;
    }

    /**
     * Setter for price.
     *
     * @param float $Price
     * @return $this
     */
    public function setPrice(float $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    /**
     * Getter for tax number.
     *
     * @return string|null
     */
    public function getTaxNumber(): ?string
    {
        return $this->TaxNumber;
    }

    /**
     * Setter for tax number.
     *
     * @param string $TaxNumber
     * @return $this
     */
    public function setTaxNumber(string $TaxNumber): self
    {
        $this->TaxNumber = $TaxNumber;

        return $this;
    }
}
