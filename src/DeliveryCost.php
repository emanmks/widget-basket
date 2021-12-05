<?php

declare(strict_types=1);

namespace Eman\WidgetBasket;

class DeliveryCost
{
    private array $deliveryCostConfig;

    public const FREE_DELIVERY = 0;

    public function __construct(array $configValue)
    {
        $this->deliveryCostConfig = $configValue;
    }

    /**
     * @param float $totalSpend
     *
     * @return float
     */
    public function calculateCost(float $totalSpend): float
    {
        if ($totalSpend <= 0) {
            throw new \InvalidArgumentException();
        }

        if ($totalSpend < 50) {
            return $this->deliveryCostConfig['lt50'];
        }

        if ($totalSpend < 90) {
            return $this->deliveryCostConfig['lt90'];
        }

        return self::FREE_DELIVERY;
    }
}
