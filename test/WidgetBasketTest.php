<?php

declare(strict_types=1);

namespace Test;

use Eman\WidgetBasket\DataProvider\ArrayDataProvider;
use Eman\WidgetBasket\Exceptions\WidgetNotFoundException;
use Eman\WidgetBasket\WidgetBasket;
use PHPUnit\Framework\TestCase;

class WidgetBasketTest extends TestCase
{
    private WidgetBasket $widgetBasket;
    private float $deliveryCost1 = 4.95;
    private float $deliveryCost2 = 2.95;
    private ArrayDataProvider $dataProvider;

    protected function setUp(): void
    {
        parent::setUp();
        $this->dataProvider = new ArrayDataProvider();
        $this->widgetBasket = new WidgetBasket($this->dataProvider);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->widgetBasket->empty();
    }

    public function testThrowsExceptionWhenGivenCodeIsNotExist()
    {
        $this->expectException(WidgetNotFoundException::class);

        $this->widgetBasket->addItem('0129');
    }

    public function testTotalIsZeroWhenBasketIsEmpty()
    {
        $this->assertEquals(0, $this->widgetBasket->getTotal());
    }

    /**
     * @return void
     * @throws WidgetNotFoundException
     */
    public function testTakeItemsWithTotalLessThan50GetSpecifiedDeliveryCost()
    {
        $total = 0;
        $this->widgetBasket->addItem('B01');
        $total += ($this->dataProvider->getItemByCode('B01'))['price'];
        $this->widgetBasket->addItem('G01');
        $total += ($this->dataProvider->getItemByCode('G01'))['price'];

        $this->assertEquals($total + $this->deliveryCost1, $this->widgetBasket->getTotal());
    }

    /**
     * @return void
     * @throws WidgetNotFoundException
     */
    public function testTakeItemsWithTotalLessThan90GetSpecifiedDeliveryCost()
    {
        $total = 0;
        $this->widgetBasket->addItem('R01');
        $total += ($this->dataProvider->getItemByCode('R01'))['price'];
        $this->widgetBasket->addItem('G01');
        $total += ($this->dataProvider->getItemByCode('G01'))['price'];
        $this->assertEquals($total + $this->deliveryCost2, $this->widgetBasket->getTotal());
    }

    /**
     * @return void
     * @throws WidgetNotFoundException
     */
    public function testTakeItemsWithTotalMoreThan90GetFreeDeliveryCost()
    {
        $total = 0;
        $this->widgetBasket->addItem('R01');
        $total += ($this->dataProvider->getItemByCode('R01'))['price'];
        $this->widgetBasket->addItem('G01');
        $total += ($this->dataProvider->getItemByCode('G01'))['price'];
        $this->widgetBasket->addItem('B01');
        $total += ($this->dataProvider->getItemByCode('B01'))['price'];
        $this->widgetBasket->addItem('G01');
        $total += ($this->dataProvider->getItemByCode('G01'))['price'];
        $this->assertEquals($total, $this->widgetBasket->getTotal());
    }
}
