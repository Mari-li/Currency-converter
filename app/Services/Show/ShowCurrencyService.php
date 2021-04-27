<?php


namespace App\Services\Show;


use App\Models\Currency;
use Illuminate\Database\Eloquent\Collection;

class ShowCurrencyService
{
    public function execute(ShowCurrencyRequest $request): Currency
    {
      return Currency::findOrFail($request->getCode());
    }

    public function getAll():\Illuminate\Support\Collection
    {
        return Currency::all();

    }

}
