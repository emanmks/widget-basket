<?php

namespace Eman\WidgetBasket\DataProvider;

/**
 * This is just an example of how we can dynamically implement data different data source
 * for the widget basket
 */
class MySqlDataProvider implements WidgetDataProvider
{
    /**
     * @param string $code
     *
     * @return array
     */
    public function getItemByCode(string $code): array
    {
        return [];
    }
}
