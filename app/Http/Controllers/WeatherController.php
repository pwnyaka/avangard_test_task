<?php

namespace App\Http\Controllers;

use App\Dictionary;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    public function index()
    {
        $apiKey = '45c15b95-bb8c-4c6a-9d85-3682a5b2e4ff';
        $lat = 53.243562;
        $lon = 34.363407;
        $url = 'https://api.weather.yandex.ru/v2/forecast?lat='.$lat.'&lon='.$lon.'&lang=ru_RU';
        $client = new Client();
        $res = $client->request('GET', $url, [
            'headers' => [
                'X-Yandex-API-Key' => $apiKey]
        ]);
        $data = json_decode($res->getBody());
        $dictionary = [];
        $dictionary['condition'] = Dictionary::query()->select('text')->where('slug', $data->fact->condition)->first();
        $dictionary['wind_dir'] = Dictionary::query()->select('text')->where('slug', $data->fact->wind_dir)->first();
        return view('wheather')->with('data', ['dictionary' => $dictionary, 'data' => $data]);
    }
}
