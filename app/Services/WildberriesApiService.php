<?php

namespace App\Services;

use GuzzleHttp\Client;
use App\Models\{Sale, Order, Stock, Income};

class WildberriesApiService
{
    protected $client;
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $protocol = 'http://'; // Укажите протокол
        $host = '89.108.115.241'; // Укажите хост
        $port = '6969'; // Укажите порт
        $this->apiKey = env('WB_API_KEY'); // Получаем API-ключ из .env

        $this->baseUrl = "{$protocol}{$host}:{$port}/api/";
        $this->client = new Client(['base_uri' => $this->baseUrl]);
    }

    public function getAllData($endpoint, $dateFrom, $dateTo)
    {
        $page = 1;
        $allData = [];

        do {
            $data = $this->getData($endpoint, $dateFrom, $dateTo, $page);
            $allData = array_merge($allData, $data['data']); // Извлекаем данные из массива 'data'
            $page++;
        } while (count($data['data']) === 500); // Проверяем количество записей в 'data'

        return $allData;
    }

    private function getData($endpoint, $dateFrom, $dateTo, $page)
    {
        if ($endpoint === 'stocks') {
            $response = $this->client->get($this->baseUrl . $endpoint, [
                'query' => [
                    'dateFrom' => date('Y-m-d'),
                    'page' => $page,
                    'limit' => 500,
                    'key' => $this->apiKey,
                ],
            ]);
        } else {
            $response = $this->client->get($this->baseUrl . $endpoint, [
                'query' => [
                    'dateFrom' => $dateFrom,
                    'dateTo' => $dateTo,
                    'page' => $page,
                    'limit' => 500,
                    'key' => $this->apiKey,
                ],
            ]);
        }


        if ($response->getStatusCode() !== 200) {
            throw new \Exception('Ошибка API: ' . $response->getBody()->getContents());
        }

        return json_decode($response->getBody()->getContents(), true);
    }

    public function saveSalesData($salesData)
    {
        $chunkSize = 1000; // Размер каждого чанка

        foreach (array_chunk($salesData, $chunkSize) as $chunk) {
            Sale::insert($chunk); // Массовое сохранение продаж для каждого чанка
        }
    }

    public function saveOrdersData($ordersData)
    {
        $chunkSize = 1000; // Размер каждого чанка

        foreach (array_chunk($ordersData, $chunkSize) as $chunk) {
            Order::insert($chunk); // Массовое сохранение продаж для каждого чанка
        }
    }

    public function saveStocksData($stocksData)
    {
        $chunkSize = 1000; // Размер каждого чанка

        foreach (array_chunk($stocksData, $chunkSize) as $chunk) {
            Stock::insert($chunk); // Массовое сохранение продаж для каждого чанка
        }
    }

    public function saveIncomesData($incomesData)
    {
        $chunkSize = 1000; // Размер каждого чанка

        foreach (array_chunk($incomesData, $chunkSize) as $chunk) {
            Income::insert($chunk); // Массовое сохранение продаж для каждого чанка
        }
    }
}
