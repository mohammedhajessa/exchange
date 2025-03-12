<?php

namespace App\Console\Commands;

use App\Models\Currency;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class UpdateCurrencyRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:update-rates';
    protected $description = 'Update currency rates';

    /**
     * The console command description.
     *

     * Execute the console command.
     */
    public function handle()

    {
        $apiKey = env('EXCHANGE_RATE_API_KEY');
        $response = Http::get('https://v6.exchangerate-api.com/v6/'.$apiKey.'/latest/USD');
        $data = $response->json();
        $currencies = Currency::all();
        foreach ($currencies as $currency) {
            if (isset($data['conversion_rates'][$currency->code])) {
                $currency->update(['exchange_rate' => $data['conversion_rates'][$currency->code]]);
            }
        }
        return $data;
    }
}
