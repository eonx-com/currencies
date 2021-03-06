<?php
declare(strict_types=1);

namespace Tests\EoneoPay\Currencies;

use EoneoPay\Currencies\Currencies\Aud;
use EoneoPay\Currencies\Exceptions\InvalidCurrencyCodeException;
use EoneoPay\Currencies\ISO4217;
use PHPUnit\Framework\TestCase;

/**
 * @covers \EoneoPay\Currencies\ISO4217
 * @covers \EoneoPay\Currencies\Iterator
 */
class ISO4217Test extends TestCase
{
    /**
     * Find currency by alpha or numeric code
     *
     * @return void
     */
    public function testFindCurrencyByCode(): void
    {
        $iso4217 = new ISO4217();

        // Ensure not case sensitive
        self::assertInstanceOf(Aud::class, $iso4217->find('AUD'));
        self::assertInstanceOf(Aud::class, $iso4217->find('aud'));

        // Search by numeric code
        self::assertInstanceOf(Aud::class, (new ISO4217())->find('036'));
    }

    /**
     * Test finding an invalid currency code
     *
     * @return void
     */
    public function testFindInvalidCurrencyCode(): void
    {
        $this->expectException(InvalidCurrencyCodeException::class);

        (new ISO4217())->find('INVALID');
    }

    /**
     * Test supported currencies returns an array containing a known type
     *
     * @return void
     */
    public function testGetSupportedAlphaCodes(): void
    {
        self::assertContains('AUD', (new ISO4217())->getSupportedAlphaCodes());
    }
}
