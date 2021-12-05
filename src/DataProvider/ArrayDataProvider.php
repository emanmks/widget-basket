<?php

namespace Eman\WidgetBasket\DataProvider;

final class ArrayDataProvider implements WidgetDataProvider
{
    private array $data;

    public function __construct()
    {
        $this->data = [
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
     * @return array
     */
    public function getItemByCode(string $code): array
    {
        return $this->data[$code] ?? [];
    }
}
