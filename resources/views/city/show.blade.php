<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <div class="card mt-5">
            <h5 class="card-header">
                <a href="https://openweathermap.org/city/{{ \Illuminate\Support\Arr::get($cityWeather, 'id') }}"> {{ \Illuminate\Support\Arr::get($cityWeather, 'name') }}, {{ \Illuminate\Support\Arr::get($cityWeather, 'country') }}</a>
                <img src="http://openweathermap.org/images/flags/{{ \Illuminate\Support\Str::lower(\Illuminate\Support\Arr::get($cityWeather, 'country')) }}.png" />
                <span class="float-end">{{ \Illuminate\Support\Arr::get($current, 'weather.0.main') }}</span>
            </h5>
            <div class="card-body">
                <b><i> {{ \Illuminate\Support\Arr::get($current, 'weather.description') }}</i></b>
                <p>
                    <span class="badge text-bg-primary">{{ \Illuminate\Support\Arr::get($current, 'main.temp') }} °С </span>
                    temperature from {{ \Illuminate\Support\Arr::get($current, 'main.temp_min') }} to {{ \Illuminate\Support\Arr::get($current, 'main.temp_max') }} °С, wind {{ \Illuminate\Support\Arr::get($current, 'wind.speed') }} m/s. clouds {{ \Illuminate\Support\Arr::get($current, 'clouds.all') }} %
                </p>
                <p>Geo coords [{{ \Illuminate\Support\Arr::get($cityWeather, 'coord.lat') }}, {{ \Illuminate\Support\Arr::get($cityWeather, 'coord.lon') }}]</p>

                <div class="card mt-5">
                    <h5 class="card-header">{{ \Carbon\Carbon::parse($current['dt_txt'])->toDateString() }}</h5>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                @foreach($forecast as $key => $forecastItem)
                    @if (isset($forecast[$key - 1]) && \Carbon\Carbon::parse($forecast[$key - 1]['dt_txt'])->toDateString() != \Carbon\Carbon::parse($forecastItem['dt_txt'])->toDateString())
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mt-5">
                        <h5 class="card-header">{{ \Carbon\Carbon::parse($forecastItem['dt_txt'])->toDateString() }}</h5>
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                    @endif
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($forecastItem['dt_txt'])->toDayDateTimeString() }}</td>
                        <td><span class="badge text-bg-primary">{{ \Illuminate\Support\Arr::get($forecastItem, 'main.temp') }} °С </span>
                            temperature from {{ \Illuminate\Support\Arr::get($forecastItem, 'main.temp_min') }} to {{ \Illuminate\Support\Arr::get($forecastItem, 'main.temp_max') }} °С, wind {{ \Illuminate\Support\Arr::get($forecastItem, 'wind.speed') }} m/s. clouds {{ \Illuminate\Support\Arr::get($forecastItem, 'clouds.all') }} %</td>
                    </tr>
                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </body>
</html>
