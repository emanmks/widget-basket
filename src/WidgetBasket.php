<?php

declare(strict_types=1);

namespace Eman\WidgetBasket;

use Eman\WidgetBasket\DataProvider\WidgetDataProvider;
use Eman\WidgetBasket\Exceptions\WidgetNotFoundException;

class WidgetBasket
{
    private WidgetDataProvider $dataProvider;
    private DeliveryCost $deliveryCost;
    private array $items;
    private float $total = 0;

    /**
     * @param WidgetDataProvider $dataProvider
     * @param DeliveryCost       $deliveryCost
     */
    public function __construct(WidgetDataProvider$dataProvider, DeliveryCost $deliveryCost)
    {
        $this->dataProvider = $dataProvider;
        $this->deliveryCost = $deliveryCost;
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
    public function getItemList(): string
    {
        return implode(',', $this->items);
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total + (
            $this->total > 0 ?
                $this->deliveryCost->calculateCost($this->total) : 0
            );
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
