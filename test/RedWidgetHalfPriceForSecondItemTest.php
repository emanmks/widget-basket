<?php

namespace Test;

use Eman\WidgetBasket\Offer\RedWidgetHalfPriceForSecondItem;
use PHPUnit\Framework\TestCase;

class RedWidgetHalfPriceForSecondItemTest extends TestCase
{
    public function testApplyNewPriceWhenConditionIsMetTheOfferRule()
    {
        $offer = new RedWidgetHalfPriceForSecondItem('R01');
        $newPrice = $offer->applyNewPrice(['R01', 'G01', 'B01', 'R01'], 20);

        $this->assertEquals(10, $newPrice);
    }
}
