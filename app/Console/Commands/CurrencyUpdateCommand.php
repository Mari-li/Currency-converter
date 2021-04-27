<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Update\UpdateCurrenciesService;

class CurrencyUpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets currency rates from bank.lv';
    /**
     * @var UpdateCurrenciesService
     */
    private $updateCurrenciesService;

    /**
     * Create a new command instance.
     *
     * @param UpdateCurrenciesService $updateCurrenciesService
     */
    public function __construct(UpdateCurrenciesService $updateCurrenciesService)
    {
        parent::__construct();


        $this->updateCurrenciesService = $updateCurrenciesService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->updateCurrenciesService->execute();
        return 1;
    }
}
