<?php


namespace App\Services\Update;


use App\Models\Currency;

class UpdateCurrenciesService
{
    public function execute(): void
    {
        var_dump('EXECUTING COMMAND');
        $xmlString = file_get_contents('https://www.bank.lv/vk/ecb.xml');
        $xmlObject = simplexml_load_string($xmlString);

        $json = json_encode($xmlObject);
        $data = json_decode($json, true)['Currencies']['Currency'];

        foreach ($data as $currency) {
            Currency::upsert(
                [
                    'code' => $currency['ID'],
                    'rate' => (int)((float)$currency['Rate'] * 100000)
                ], ['code'], ['rate']);
        }
    }

}
