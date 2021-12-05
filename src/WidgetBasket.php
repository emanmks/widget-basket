<?php

namespace Eman\WidgetBasket;

use Eman\WidgetBasket\DataProvider\WidgetDataProvider;
use Eman\WidgetBasket\Exceptions\WidgetNotFoundException;

class WidgetBasket
{
    private WidgetDataProvider $dataProvider;
    private array $items = [];
    private float $total = 0;

    /**
     * @param WidgetDataProvider $dataProvider
     */
    public function __construct(WidgetDataProvider$dataProvider)
    {
        $this->dataProvider = $dataProvider;
    }

    /**
     * @param string $code
     *
     * @return void
     * @throws WidgetNotFoundException
     */
    public function addItem(string $code): void
    {
        $item = $this->dataProvider->getItemByCode($code);
        if (empty($item)) {
            throw new WidgetNotFoundException();
        }

        $this->items[] = $code;
        $this->total += $item['price'];
    }

    /**
     * @return string
     */
    public function getBasketItem(): string
    {
        return implode(',', $this->items);
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        if ($this->total > 0 && $this->total < 50) {
            return $this->total + 4.95;
        }

        if ($this->total >= 50 && $this->total < 90) {
            return $this->total + 2.95;
        }

        return $this->total;
    }

    /**
     * @return void
     */
    public function empty(): void
    {
        $this->items = [];
        $this->total =0;
    }
}
