<?php

declare(strict_types=1);

namespace Test;

use Eman\WidgetBasket\WidgetBasket;
use PHPUnit\Framework\TestCase;

class WidgetBasketTest extends TestCase
{
    public function testWidgetBasketIsExist()
    {
        $widgetBasket = new WidgetBasket();

        $this->assertInstanceOf(WidgetBasket::class, $widgetBasket);
    }
}
