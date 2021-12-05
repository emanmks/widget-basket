<?php

namespace Eman\WidgetBasket;

use Eman\WidgetBasket\Exceptions\WidgetNotFoundException;

class WidgetBasket
{
    private array $widgets = [];
    private array $items = [];
    private float $total = 0;

    public function __construct()
    {
        $this->widgets = [
            'R01' => [
                'name' => 'Red Widget',
                'price' => 32.95
            ],
            'G01' => [
                'name' => 'Green Widget',
                'price' => 24.95
            ],
            'B01' => [
                'name' => 'Blue Widget',
                'price' => 7.95
            ],
        ];
    }

    /**
     * @param string $code
     *
     * @return void
     * @throws WidgetNotFoundException
     */
    public function addItem(string $code): void
    {
        if (!key_exists($code, $this->widgets)) {
            throw new WidgetNotFoundException();
        }

        $this->items[] = $code;
        $this->updateTotalBy($code);
    }

    /**
     * @param string $code
     *
     * @return void
     */
    private function updateTotalBy(string $code): void
    {
        $this->total += $this->widgets[$code]['price'];
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
