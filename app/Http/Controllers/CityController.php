<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Weather\Weather;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;


class CityController extends Controller
{
    public function index()
    {
        return view('city.index', [
            'cities' => City::query()->paginate(10)
        ]);
    }

    public function show(Request $request)
    {
        $city = City::query()->findOrFail($request->id);

        $weather = Weather::create()
            ->setName($city->name)
            ->get();

        if ($weather['cod'] != 200) {
            abort(404);
        }

        $cityWeather = Arr::get($weather, 'city');

        $forecast = Arr::get($weather, 'list');

        $current = Arr::first($forecast);

        return view('city.show', compact('city', 'cityWeather', 'weather', 'forecast', 'current'));
    }

    public function create()
    {
        return view('city.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $city = new City();
        $city->name = $request->name;
        $city->save();

        return redirect()->route('get.city.index');
    }
}
