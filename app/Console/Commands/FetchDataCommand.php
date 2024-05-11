<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\WildberriesApiService;

class FetchDataCommand extends Command
{
    protected $signature = 'fetch:data {--dateFrom=} {--dateTo=}';
    protected $description = 'Получение данных из API Wildberries';

    public function handle(WildberriesApiService $apiService)
    {
        $dateFrom = $this->option('dateFrom') ?: date('Y-m-d');
        $dateTo = $this->option('dateTo') ?: date('Y-m-d');

        // Получение и сохранение данных из API
        $salesData = $apiService->getAllData('sales', $dateFrom, $dateTo);
        $ordersData = $apiService->getAllData('orders', $dateFrom, $dateTo);
        $incomesData = $apiService->getAllData('incomes', $dateFrom, $dateTo);
        $stocksData = $apiService->getAllData('stocks', $dateFrom, $dateTo);

        $apiService->saveSalesData($salesData);
        $apiService->saveOrdersData($ordersData);
        $apiService->saveIncomesData($incomesData);
        $apiService->saveStocksData($stocksData);

        $this->info('Данные успешно получены и сохранены в БД!');
    }
}
