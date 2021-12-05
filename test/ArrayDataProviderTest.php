<?php

namespace Test;

use Eman\WidgetBasket\DataProvider\ArrayDataProvider;
use Eman\WidgetBasket\DataProvider\WidgetDataProvider;
use PHPUnit\Framework\TestCase;

class ArrayDataProviderTest extends TestCase
{
    private WidgetDataProvider $dataProvider;

    protected function setUp(): void
    {
        parent::setUp();
        $this->dataProvider = new ArrayDataProvider();
    }

    public function testDataProviderWillReturnEmptyGivenCodeIsNotExist()
    {
        $result = $this->dataProvider->getItemByCode('000');

        $this->assertEmpty($result);
    }

    public function testDataProviderWillReturnSetOfWidgetInformation()
    {
        $result = $this->dataProvider->getItemByCode('R01');

        $this->assertNotEmpty($result);
        $this->assertArrayHasKey('name', $result);
        $this->assertArrayHasKey('price', $result);
    }
}
