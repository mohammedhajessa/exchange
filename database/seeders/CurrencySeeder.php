<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies = [
            ['name' => 'US Dollar', 'code' => 'USD', 'exchange_rate' => 1],
            ['name' => 'UAE Dirham', 'code' => 'AED', 'exchange_rate' => 0],
            ['name' => 'Afghan Afghani', 'code' => 'AFN', 'exchange_rate' => 0],
            ['name' => 'Albanian Lek', 'code' => 'ALL', 'exchange_rate' => 0],
            ['name' => 'Armenian Dram', 'code' => 'AMD', 'exchange_rate' => 0],
            ['name' => 'Netherlands Antillian Guilder', 'code' => 'ANG', 'exchange_rate' => 0],
            ['name' => 'Angolan Kwanza', 'code' => 'AOA', 'exchange_rate' => 0],
            ['name' => 'Argentine Peso', 'code' => 'ARS', 'exchange_rate' => 0],
            ['name' => 'Australian Dollar', 'code' => 'AUD', 'exchange_rate' => 0],
            ['name' => 'Aruban Florin', 'code' => 'AWG', 'exchange_rate' => 0],
            ['name' => 'Azerbaijani Manat', 'code' => 'AZN', 'exchange_rate' => 0],
            ['name' => 'Bosnia and Herzegovina Mark', 'code' => 'BAM', 'exchange_rate' => 0],
            ['name' => 'Barbados Dollar', 'code' => 'BBD', 'exchange_rate' => 0],
            ['name' => 'Bangladeshi Taka', 'code' => 'BDT', 'exchange_rate' => 0],
            ['name' => 'Bulgarian Lev', 'code' => 'BGN', 'exchange_rate' => 0],
            ['name' => 'Bahraini Dinar', 'code' => 'BHD', 'exchange_rate' => 0],
            ['name' => 'Burundian Franc', 'code' => 'BIF', 'exchange_rate' => 0],
            ['name' => 'Bermudian Dollar', 'code' => 'BMD', 'exchange_rate' => 0],
            ['name' => 'Brunei Dollar', 'code' => 'BND', 'exchange_rate' => 0],
            ['name' => 'Bolivian Boliviano', 'code' => 'BOB', 'exchange_rate' => 0],
            ['name' => 'Brazilian Real', 'code' => 'BRL', 'exchange_rate' => 0],
            ['name' => 'Bahamian Dollar', 'code' => 'BSD', 'exchange_rate' => 0],
            ['name' => 'Bhutanese Ngultrum', 'code' => 'BTN', 'exchange_rate' => 0],
            ['name' => 'Botswana Pula', 'code' => 'BWP', 'exchange_rate' => 0],
            ['name' => 'Belarusian Ruble', 'code' => 'BYN', 'exchange_rate' => 0],
            ['name' => 'Belize Dollar', 'code' => 'BZD', 'exchange_rate' => 0],
            ['name' => 'Canadian Dollar', 'code' => 'CAD', 'exchange_rate' => 0],
            ['name' => 'Congolese Franc', 'code' => 'CDF', 'exchange_rate' => 0],
            ['name' => 'Swiss Franc', 'code' => 'CHF', 'exchange_rate' => 0],
            ['name' => 'Chilean Peso', 'code' => 'CLP', 'exchange_rate' => 0],
            ['name' => 'Chinese Renminbi', 'code' => 'CNY', 'exchange_rate' => 0],
            ['name' => 'Colombian Peso', 'code' => 'COP', 'exchange_rate' => 0],
            ['name' => 'Costa Rican Colon', 'code' => 'CRC', 'exchange_rate' => 0],
            ['name' => 'Cuban Peso', 'code' => 'CUP', 'exchange_rate' => 0],
            ['name' => 'Cape Verdean Escudo', 'code' => 'CVE', 'exchange_rate' => 0],
            ['name' => 'Czech Koruna', 'code' => 'CZK', 'exchange_rate' => 0],
            ['name' => 'Djiboutian Franc', 'code' => 'DJF', 'exchange_rate' => 0],
            ['name' => 'Danish Krone', 'code' => 'DKK', 'exchange_rate' => 0],
            ['name' => 'Dominican Peso', 'code' => 'DOP', 'exchange_rate' => 0],
            ['name' => 'Algerian Dinar', 'code' => 'DZD', 'exchange_rate' => 0],
            ['name' => 'Egyptian Pound', 'code' => 'EGP', 'exchange_rate' => 0],
            ['name' => 'Eritrean Nakfa', 'code' => 'ERN', 'exchange_rate' => 0],
            ['name' => 'Ethiopian Birr', 'code' => 'ETB', 'exchange_rate' => 0],
            ['name' => 'Euro', 'code' => 'EUR', 'exchange_rate' => 0],
            ['name' => 'Fiji Dollar', 'code' => 'FJD', 'exchange_rate' => 0],
            ['name' => 'Falkland Islands Pound', 'code' => 'FKP', 'exchange_rate' => 0],
            ['name' => 'Faroese Króna', 'code' => 'FOK', 'exchange_rate' => 0],
            ['name' => 'Pound Sterling', 'code' => 'GBP', 'exchange_rate' => 0],
            ['name' => 'Georgian Lari', 'code' => 'GEL', 'exchange_rate' => 0],
            ['name' => 'Guernsey Pound', 'code' => 'GGP', 'exchange_rate' => 0],
            ['name' => 'Ghanaian Cedi', 'code' => 'GHS', 'exchange_rate' => 0],
            ['name' => 'Gibraltar Pound', 'code' => 'GIP', 'exchange_rate' => 0],
            ['name' => 'Gambian Dalasi', 'code' => 'GMD', 'exchange_rate' => 0],
            ['name' => 'Guinean Franc', 'code' => 'GNF', 'exchange_rate' => 0],
            ['name' => 'Guatemalan Quetzal', 'code' => 'GTQ', 'exchange_rate' => 0],
            ['name' => 'Guyanese Dollar', 'code' => 'GYD', 'exchange_rate' => 0],
            ['name' => 'Hong Kong Dollar', 'code' => 'HKD', 'exchange_rate' => 0],
            ['name' => 'Honduran Lempira', 'code' => 'HNL', 'exchange_rate' => 0],
            ['name' => 'Croatian Kuna', 'code' => 'HRK', 'exchange_rate' => 0],
            ['name' => 'Haitian Gourde', 'code' => 'HTG', 'exchange_rate' => 0],
            ['name' => 'Hungarian Forint', 'code' => 'HUF', 'exchange_rate' => 0],
            ['name' => 'Indonesian Rupiah', 'code' => 'IDR', 'exchange_rate' => 0],
            ['name' => 'Israeli New Shekel', 'code' => 'ILS', 'exchange_rate' => 0],
            ['name' => 'Isle of Man Pound', 'code' => 'IMP', 'exchange_rate' => 0],
            ['name' => 'Indian Rupee', 'code' => 'INR', 'exchange_rate' => 0],
            ['name' => 'Iraqi Dinar', 'code' => 'IQD', 'exchange_rate' => 0],
            ['name' => 'Iranian Rial', 'code' => 'IRR', 'exchange_rate' => 0],
            ['name' => 'Icelandic Króna', 'code' => 'ISK', 'exchange_rate' => 0],
            ['name' => 'Jersey Pound', 'code' => 'JEP', 'exchange_rate' => 0],
            ['name' => 'Jamaican Dollar', 'code' => 'JMD', 'exchange_rate' => 0],
            ['name' => 'Jordanian Dinar', 'code' => 'JOD', 'exchange_rate' => 0],
            ['name' => 'Japanese Yen', 'code' => 'JPY', 'exchange_rate' => 0],
            ['name' => 'Kenyan Shilling', 'code' => 'KES', 'exchange_rate' => 0],
            ['name' => 'Kyrgyzstani Som', 'code' => 'KGS', 'exchange_rate' => 0],
            ['name' => 'Cambodian Riel', 'code' => 'KHR', 'exchange_rate' => 0],
            ['name' => 'Kiribati Dollar', 'code' => 'KID', 'exchange_rate' => 0],
            ['name' => 'Comorian Franc', 'code' => 'KMF', 'exchange_rate' => 0],
            ['name' => 'South Korean Won', 'code' => 'KRW', 'exchange_rate' => 0],
            ['name' => 'Kuwaiti Dinar', 'code' => 'KWD', 'exchange_rate' => 0],
            ['name' => 'Cayman Islands Dollar', 'code' => 'KYD', 'exchange_rate' => 0],
            ['name' => 'Kazakhstani Tenge', 'code' => 'KZT', 'exchange_rate' => 0],
            ['name' => 'Lao Kip', 'code' => 'LAK', 'exchange_rate' => 0],
            ['name' => 'Lebanese Pound', 'code' => 'LBP', 'exchange_rate' => 0],
            ['name' => 'Sri Lanka Rupee', 'code' => 'LKR', 'exchange_rate' => 0],
            ['name' => 'Liberian Dollar', 'code' => 'LRD', 'exchange_rate' => 0],
            ['name' => 'Lesotho Loti', 'code' => 'LSL', 'exchange_rate' => 0],
            ['name' => 'Libyan Dinar', 'code' => 'LYD', 'exchange_rate' => 0],
            ['name' => 'Moroccan Dirham', 'code' => 'MAD', 'exchange_rate' => 0],
            ['name' => 'Moldovan Leu', 'code' => 'MDL', 'exchange_rate' => 0],
            ['name' => 'Malagasy Ariary', 'code' => 'MGA', 'exchange_rate' => 0],
            ['name' => 'Macedonian Denar', 'code' => 'MKD', 'exchange_rate' => 0],
            ['name' => 'Myanmar Kyat', 'code' => 'MMK', 'exchange_rate' => 0],
            ['name' => 'Mongolian Tugrik', 'code' => 'MNT', 'exchange_rate' => 0],
            ['name' => 'Macanese Pataca', 'code' => 'MOP', 'exchange_rate' => 0],
            ['name' => 'Mauritanian Ouguiya', 'code' => 'MRU', 'exchange_rate' => 0],
            ['name' => 'Mauritian Rupee', 'code' => 'MUR', 'exchange_rate' => 0],
            ['name' => 'Maldivian Rufiyaa', 'code' => 'MVR', 'exchange_rate' => 0],
            ['name' => 'Malawian Kwacha', 'code' => 'MWK', 'exchange_rate' => 0],
            ['name' => 'Mexican Peso', 'code' => 'MXN', 'exchange_rate' => 0],
            ['name' => 'Malaysian Ringgit', 'code' => 'MYR', 'exchange_rate' => 0],
            ['name' => 'Mozambican Metical', 'code' => 'MZN', 'exchange_rate' => 0],
            ['name' => 'Namibian Dollar', 'code' => 'NAD', 'exchange_rate' => 0],
            ['name' => 'Nigerian Naira', 'code' => 'NGN', 'exchange_rate' => 0],
            ['name' => 'Nicaraguan Córdoba', 'code' => 'NIO', 'exchange_rate' => 0],
            ['name' => 'Norwegian Krone', 'code' => 'NOK', 'exchange_rate' => 0],
            ['name' => 'Nepalese Rupee', 'code' => 'NPR', 'exchange_rate' => 0],
            ['name' => 'New Zealand Dollar', 'code' => 'NZD', 'exchange_rate' => 0],
            ['name' => 'Omani Rial', 'code' => 'OMR', 'exchange_rate' => 0],
            ['name' => 'Panamanian Balboa', 'code' => 'PAB', 'exchange_rate' => 0],
            ['name' => 'Peruvian Sol', 'code' => 'PEN', 'exchange_rate' => 0],
            ['name' => 'Papua New Guinean Kina', 'code' => 'PGK', 'exchange_rate' => 0],
            ['name' => 'Philippine Peso', 'code' => 'PHP', 'exchange_rate' => 0],
            ['name' => 'Pakistani Rupee', 'code' => 'PKR', 'exchange_rate' => 0],
            ['name' => 'Polish Złoty', 'code' => 'PLN', 'exchange_rate' => 0],
            ['name' => 'Paraguayan Guaraní', 'code' => 'PYG', 'exchange_rate' => 0],
            ['name' => 'Qatari Riyal', 'code' => 'QAR', 'exchange_rate' => 0],
            ['name' => 'Romanian Leu', 'code' => 'RON', 'exchange_rate' => 0],
            ['name' => 'Serbian Dinar', 'code' => 'RSD', 'exchange_rate' => 0],
            ['name' => 'Russian Ruble', 'code' => 'RUB', 'exchange_rate' => 0],
            ['name' => 'Rwandan Franc', 'code' => 'RWF', 'exchange_rate' => 0],
            ['name' => 'Saudi Riyal', 'code' => 'SAR', 'exchange_rate' => 0],
            ['name' => 'Solomon Islands Dollar', 'code' => 'SBD', 'exchange_rate' => 0],
            ['name' => 'Seychellois Rupee', 'code' => 'SCR', 'exchange_rate' => 0],
            ['name' => 'Sudanese Pound', 'code' => 'SDG', 'exchange_rate' => 0],
            ['name' => 'Swedish Krona', 'code' => 'SEK', 'exchange_rate' => 0],
            ['name' => 'Singapore Dollar', 'code' => 'SGD', 'exchange_rate' => 0],
            ['name' => 'Saint Helena Pound', 'code' => 'SHP', 'exchange_rate' => 0],
            ['name' => 'Sierra Leonean Leone', 'code' => 'SLE', 'exchange_rate' => 0],
            ['name' => 'Somali Shilling', 'code' => 'SOS', 'exchange_rate' => 0],
            ['name' => 'Surinamese Dollar', 'code' => 'SRD', 'exchange_rate' => 0],
            ['name' => 'South Sudanese Pound', 'code' => 'SSP', 'exchange_rate' => 0],
            ['name' => 'São Tomé and Príncipe Dobra', 'code' => 'STN', 'exchange_rate' => 0],
            ['name' => 'Syrian Pound', 'code' => 'SYP', 'exchange_rate' => 0],
            ['name' => 'Swazi Lilangeni', 'code' => 'SZL', 'exchange_rate' => 0],
            ['name' => 'Thai Baht', 'code' => 'THB', 'exchange_rate' => 0],
            ['name' => 'Tajikistani Somoni', 'code' => 'TJS', 'exchange_rate' => 0],
            ['name' => 'Turkmenistan Manat', 'code' => 'TMT', 'exchange_rate' => 0],
            ['name' => 'Tunisian Dinar', 'code' => 'TND', 'exchange_rate' => 0],
            ['name' => 'Tongan Paʻanga', 'code' => 'TOP', 'exchange_rate' => 0],
            ['name' => 'Turkish Lira', 'code' => 'TRY', 'exchange_rate' => 0],
            ['name' => 'Trinidad and Tobago Dollar', 'code' => 'TTD', 'exchange_rate' => 0],
            ['name' => 'Tuvaluan Dollar', 'code' => 'TVD', 'exchange_rate' => 0],
            ['name' => 'New Taiwan Dollar', 'code' => 'TWD', 'exchange_rate' => 0],
            ['name' => 'Tanzanian Shilling', 'code' => 'TZS', 'exchange_rate' => 0],
            ['name' => 'Ukrainian Hryvnia', 'code' => 'UAH', 'exchange_rate' => 0],
            ['name' => 'Ugandan Shilling', 'code' => 'UGX', 'exchange_rate' => 0],
            ['name' => 'Uruguayan Peso', 'code' => 'UYU', 'exchange_rate' => 0],
            ['name' => 'Uzbekistani Som', 'code' => 'UZS', 'exchange_rate' => 0],
            ['name' => 'Venezuelan Bolívar', 'code' => 'VES', 'exchange_rate' => 0],
            ['name' => 'Vietnamese Đồng', 'code' => 'VND', 'exchange_rate' => 0],
            ['name' => 'Vanuatu Vatu', 'code' => 'VUV', 'exchange_rate' => 0],
            ['name' => 'Samoan Tālā', 'code' => 'WST', 'exchange_rate' => 0],
            ['name' => 'Central African CFA Franc', 'code' => 'XAF', 'exchange_rate' => 0],
            ['name' => 'East Caribbean Dollar', 'code' => 'XCD', 'exchange_rate' => 0],
            ['name' => 'Special Drawing Rights', 'code' => 'XDR', 'exchange_rate' => 0],
            ['name' => 'West African CFA Franc', 'code' => 'XOF', 'exchange_rate' => 0],
            ['name' => 'CFP Franc', 'code' => 'XPF', 'exchange_rate' => 0],
            ['name' => 'Yemeni Rial', 'code' => 'YER', 'exchange_rate' => 0],
            ['name' => 'South African Rand', 'code' => 'ZAR', 'exchange_rate' => 0],
            ['name' => 'Zambian Kwacha', 'code' => 'ZMW', 'exchange_rate' => 0],
            ['name' => 'Zimbabwean Dollar', 'code' => 'ZWL', 'exchange_rate' => 0],
        ];

        foreach ($currencies as $currency) {
            Currency::create($currency);
        }
    }
}
