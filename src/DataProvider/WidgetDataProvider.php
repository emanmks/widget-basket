<?php

namespace Eman\WidgetBasket\DataProvider;

interface WidgetDataProvider
{
    /**
     * @param string $code
     *
     * @return array
     */
    public function getItemByCode(string $code): array;
}
