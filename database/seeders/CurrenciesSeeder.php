<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            [
                'name'   => 'British pound',
                'code'   => 'GBP',
                'symbol' => '£',
                'active' => true,
            ],
            [
                'name'   => 'Euro',
                'code'   => 'EUR',
                'symbol' => '€',
                'active' => true,
            ],
            [
                'name'   => 'United States dollar',
                'code'   => 'USD',
                'symbol' => '$',
                'active' => true,
            ],
            [
                'name'   => 'Australian dollar',
                'code'   => 'AUD',
                'symbol' => '$',
                'active' => true,
            ],
            [
                'name'   => 'Bulgarian lev',
                'code'   => 'BGN',
                'symbol' => 'лв.',
                'active' => true,
            ],
            [
                'name'   => 'Brazilian real',
                'code'   => 'BRL',
                'symbol' => 'R$',
                'active' => false,
            ],
            [
                'name'   => 'Canadian dollar',
                'code'   => 'CAD',
                'symbol' => '$',
                'active' => false,
            ],
            [
                'name'   => 'Chinese yuan',
                'code'   => 'CNY',
                'symbol' => '¥',
                'active' => false,
            ],
            [
                'name'   => 'Czech koruna',
                'code'   => 'CZK',
                'symbol' => 'Kč',
                'active' => false,
            ],
            [
                'name'   => 'Danish krone',
                'code'   => 'DKK',
                'symbol' => 'kr.',
                'active' => false,
            ],
            [
                'name'   => 'Hong Kong dollar',
                'code'   => 'HKD',
                'symbol' => 'HK$',
                'active' => false,
            ],
            [
                'name'   => 'Croatian kuna',
                'code'   => 'HRK',
                'symbol' => 'kn',
                'active' => false,
            ],
            [
                'name'   => 'Hungarian forint',
                'code'   => 'HUF',
                'symbol' => 'Ft',
                'active' => false,
            ],
            [
                'name'   => 'Indonesian rupiah',
                'code'   => 'IDR',
                'symbol' => 'Rp',
                'active' => false,
            ],
            [
                'name'   => 'Israeli new shekel',
                'code'   => 'ILS',
                'symbol' => '₪',
                'active' => false,
            ],
            [
                'name'   => 'Indian rupee',
                'code'   => 'INR',
                'symbol' => '₹',
                'active' => false,
            ],
            [
                'name'   => 'Icelandic króna',
                'code'   => 'ISK',
                'symbol' => 'kr',
                'active' => false,
            ],
            [
                'name'   => 'Japanese yen',
                'code'   => 'JPY',
                'symbol' => '¥',
                'active' => false,
            ],
            [
                'name'   => 'South Korean won',
                'code'   => 'KRW',
                'symbol' => '₩',
                'active' => false,
            ],
            [
                'name'   => 'Mexican peso',
                'code'   => 'MXN',
                'symbol' => '$',
                'active' => false,
            ],
            [
                'name'   => 'Malaysian ringgit',
                'code'   => 'MYR',
                'symbol' => 'RM',
                'active' => false,
            ],
            [
                'name'   => 'Norwegian krone',
                'code'   => 'NOK',
                'symbol' => 'kr',
                'active' => false,
            ],
            [
                'name'   => 'New Zealand dollar',
                'code'   => 'NZD',
                'symbol' => '$',
                'active' => false,
            ],
            [
                'name'   => 'Philippine peso',
                'code'   => 'PHP',
                'symbol' => '₱',
                'active' => false,
            ],
            [
                'name'   => 'Polish złoty',
                'code'   => 'PLN',
                'symbol' => 'zł',
                'active' => false,
            ],
            [
                'name'   => 'Romanian leu',
                'code'   => 'RON',
                'symbol' => 'lei',
                'active' => false,
            ],
            [
                'name'   => 'Russian ruble',
                'code'   => 'RUB',
                'symbol' => '₽',
                'active' => false,
            ],
            [
                'name'   => 'Swedish krona',
                'code'   => 'SEK',
                'symbol' => 'kr',
                'active' => false,
            ],
            [
                'name'   => 'Swiss franc',
                'code'   => 'CHF',
                'symbol' => 'Fr.',
                'active' => false,
            ],
            [
                'name'   => 'Singapore dollar',
                'code'   => 'SGD',
                'symbol' => 'S$',
                'active' => false,
            ],
            [
                'name'   => 'Thai baht',
                'code'   => 'THB',
                'symbol' => '฿',
                'active' => false,
            ],
            [
                'name'   => 'Turkish lira',
                'code'   => 'TRY',
                'symbol' => '₺',
                'active' => false,
            ],
        ];

        foreach ($currencies as $currency) {
            Currency::create([
                'name'   => $currency['name'],
                'code'   => $currency['code'],
                'symbol' => $currency['symbol'],
                'active' => $currency['active'],
            ]);
        }
    }
}
