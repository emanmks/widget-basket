<?php

declare(strict_types=1);

namespace Eman\WidgetBasket\Offer;

class RedWidgetHalfPriceForSecondItem implements SpecialOffer
{
    private string $targetWidgetCode;

    public function __construct(string $code)
    {
        $this->targetWidgetCode = $code;
    }

    /**
     * @param array $existingItems
     * @param float $defaultPrice
     *
     * @return float
     */
    public function applyNewPrice(array $existingItems, float $defaultPrice): float
    {
        if (empty($existingItems)) {
            return $defaultPrice;
        }

        if ($defaultPrice <= 0) {
            throw new \InvalidArgumentException();
        }

        $appearance = array_count_values($existingItems)[$this->targetWidgetCode] ?? 0;

        if ($appearance === 0) {
            return $defaultPrice;
        }

        return $appearance % 2 === 0 ? $defaultPrice / 2 : $defaultPrice;
    }
}
