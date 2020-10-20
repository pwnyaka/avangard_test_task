<?php

use Illuminate\Database\Seeder;

class DictionaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dictionaries')->insert($this->getData());
    }

    public function getData(): array
    {
        $data = [
            ['slug' => 'clear', 'text' => 'Ясно'],
            ['slug' => 'partly-cloudy', 'text' => 'Малооблачно'],
            ['slug' => 'cloudy ', 'text' => 'Облачно с прояснениями'],
            ['slug' => 'overcast', 'text' => 'Пасмурно'],
            ['slug' => 'drizzle ', 'text' => 'Морось'],
            ['slug' => 'light-rain', 'text' => 'Небольшой дождь'],
            ['slug' => 'rain', 'text' => 'Дождь'],
            ['slug' => 'moderate-rain', 'text' => 'Умеренно сильный дождь'],
            ['slug' => 'heavy-rain', 'text' => 'Сильный дождь'],
            ['slug' => 'continuous-heavy-rain', 'text' => 'Длительный сильный дождь'],
            ['slug' => 'showers', 'text' => 'Ливень'],
            ['slug' => 'wet-snow', 'text' => 'Дождь со снегом'],
            ['slug' => 'light-snow', 'text' => 'Небольшой снег'],
            ['slug' => 'snow', 'text' => 'Снег'],
            ['slug' => 'snow-showers', 'text' => 'Снегопад'],
            ['slug' => 'hail', 'text' => 'Град'],
            ['slug' => 'thunderstorm', 'text' => 'Гроза'],
            ['slug' => 'thunderstorm-with-rain', 'text' => 'Дождь с грозой'],
            ['slug' => 'thunderstorm-with-hail', 'text' => 'Гроза с градом'],
            ['slug' => 'nw', 'text' => 'Северо-западное'],
            ['slug' => 'n', 'text' => 'Северное'],
            ['slug' => 'ne', 'text' => 'Северо-восточное'],
            ['slug' => 'e', 'text' => 'Восточное'],
            ['slug' => 'se', 'text' => 'Юго-восточное'],
            ['slug' => 's', 'text' => 'Южное'],
            ['slug' => 'sw', 'text' => 'Юго-западное'],
            ['slug' => 's', 'text' => 'Западное'],
            ['slug' => 'c', 'text' => 'Штиль'],

        ];
        return $data;
    }
}
