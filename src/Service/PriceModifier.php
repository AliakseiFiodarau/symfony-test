<?php

namespace App\Service;

class PriceModifier
{
    /**
     * public constants with tax number locales.
     */
    public const TAX_NUMBER_LOCALE_FR = 'FR';
    public const TAX_NUMBER_LOCALE_IT = 'IT';

    /**
     * private constants with price modifying coefficients.
     */
    private const PRICE_MODIFIER_FR = 1.2;
    private const PRICE_MODIFIER_IT = 1.23;

    /**
     * Modifying price depending on tax number.
     *
     * @param float $price
     * @param string $taxNumber
     * @return float
     */
    public function modifyPrice(float $price, string $taxNumber): float
    {
        if (str_contains($taxNumber, self::TAX_NUMBER_LOCALE_FR)) {
            $price *= self::PRICE_MODIFIER_FR;
        };
        if (str_contains($taxNumber, self::TAX_NUMBER_LOCALE_IT)) {
            $price *= self::PRICE_MODIFIER_IT;
        };

        return $price;
    }
}