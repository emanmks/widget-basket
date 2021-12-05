<?php

declare(strict_types=1);

namespace Eman\WidgetBasket\Factory;

use Eman\WidgetBasket\DataProvider\ArrayDataProvider;
use Eman\WidgetBasket\DeliveryCost;
use Eman\WidgetBasket\Offer\RedWidgetHalfPriceForSecondItem;
use Eman\WidgetBasket\WidgetBasket;
use JetBrains\PhpStorm\Pure;

class WidgetBasketFactory
{
    /**
     * @param array $config
     *
     * @return WidgetBasket
     */
    #[Pure] public function __invoke(array $config): WidgetBasket
    {
        $deliveryCostConfig = [
            'lt50' => $config['lt50'],
            'lt90' => $config['lt90'],
        ];
        return new WidgetBasket(
            new ArrayDataProvider(),
            new DeliveryCost($deliveryCostConfig),
            new RedWidgetHalfPriceForSecondItem($config['itemCode'])
        );
    }
}
