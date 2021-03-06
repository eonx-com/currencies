<?php
declare(strict_types=1);

namespace EoneoPay\Currencies;

use EoneoPay\Currencies\Interfaces\CurrencyInterface;

/** @SuppressWarnings(PHPMD.NumberOfChildren) Base functionality for all currencies */
abstract class Currency implements CurrencyInterface
{
    /**
     * @inheritdoc
     */
    public function getAlphaCode(): string
    {
        // Get class extending currency, base class name will match alpha code
        // Replacement is required for currencies using reserved names like TRY -> TRY0
        return \preg_replace('/[^A-Z]/', '', \mb_strtoupper(\substr(\strrchr(\get_class($this), '\\'), 1)));
    }
}
