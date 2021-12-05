<?php

declare(strict_types=1);

namespace Eman\WidgetBasket\Offer;

interface SpecialOffer
{
    public function applyNewPrice(array $existingItems, float $defaultPrice): float;
}
