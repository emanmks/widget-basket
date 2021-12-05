<?php

declare(strict_types=1);

namespace Test;

use Eman\WidgetBasket\DeliveryCost;
use PHPUnit\Framework\TestCase;

class DeliveryCostTest extends TestCase
{
    private float $deliveryCost1 = 4.95;
    private float $deliveryCost2 = 2.95;
    private DeliveryCost $deliveryCost;

    protected function setUp(): void
    {
        parent::setUp();
        $this->deliveryCost = new DeliveryCost([
            'lt50' => $this->deliveryCost1,
            'lt90' => $this->deliveryCost2
        ]);
    }

    public function testSpendLessThanOrEqual50WillReturnConfiguredDeliveryCost()
    {
        $cost = $this->deliveryCost->calculateCost(rand(1, 49));

        $this->assertEquals($this->deliveryCost1, $cost);
    }

    public function testSpendLessThan90WillReturnConfiguredDeliveryCost()
    {
        $cost = $this->deliveryCost->calculateCost(rand(50, 89));

        $this->assertEquals($this->deliveryCost2, $cost);
    }

    public function testSpendMoreThan90IsFreeDelivery()
    {
        $cost = $this->deliveryCost->calculateCost(90.09);

        $this->assertEquals(DeliveryCost::FREE_DELIVERY, $cost);
    }

    public function testOnlyAcceptCostCalculationForSpendMoreThanZero()
    {
        $this->expectException(\InvalidArgumentException::class);
        $cost = $this->deliveryCost->calculateCost(0);
    }
}
