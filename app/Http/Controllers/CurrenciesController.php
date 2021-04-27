<?php

namespace App\Http\Controllers;

use App\Services\Show\ShowCurrencyRequest;
use App\Services\Show\ShowCurrencyService;
use App\Services\Update\UpdateCurrenciesService;
use Illuminate\Http\Request;

class CurrenciesController extends Controller
{
    private UpdateCurrenciesService $updateCurrenciesService;
    private ShowCurrencyService $showCurrenciesService;

    public function __construct(
        UpdateCurrenciesService $updateCurrenciesService,
        ShowCurrencyService $showCurrenciesService)
    {
        $this->updateCurrenciesService = $updateCurrenciesService;
        $this->showCurrenciesService = $showCurrenciesService;
    }


    public function show()
    {
        $currencies = $this->showCurrenciesService->getAll();
        return view('currency', ['currencies' => $currencies]);
    }

    public function convert(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'amount' => 'required|numeric|min:0',
        ]);

        $this->updateCurrenciesService->execute();
        $currency = new ShowCurrencyRequest($_POST['code']);
        $amount = $_POST['amount'];
        $conversion = number_format(
            ($this->showCurrenciesService->execute($currency)->rate)/100000 * $amount,
            2);

        return redirect('/')->with('conversion', $amount . ' EUR = ' . $conversion . ' '.  $currency->getCode()) ;
    }


}
