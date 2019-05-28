<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Flight;
use App\Models\Airport;

class SiteController extends Controller
{
    public function index()
    {
        $title = 'Principal';

        $airports = Airport::with('city')->get();

        return view('site.home.index', compact('title', 'airports'));
    }

    public function promotions()
    {
        $title = 'Promoções';
        return view('site.promotions.list', compact('title'));
    }

    public function flightSearch(Request $request, Flight $flight)
    {
        $title = 'Resultado da pesquisa';

        $origin = getInfoAirport($request->origin);
        $destination = getInfoAirport($request->destination);

        $request['origin'] = $origin['airportId'];
        $request['destination'] = $destination['airportId'];

        $flights = $flight->search($request);

        return view( 'site.flights.index', [
            'title' => $title,
            'flights' => $flights,
            'city_origin' =>  $origin['cityName'],
            'city_destination' =>  $destination['cityName'],
            'flight_date' => formatDate($request->date)
        ] );
        
    }

    public function flightShow($flightId)
    {
        $flight = Flight::with(['origin','destination'])->find($flightId);
        if( !$flight ) return redirect()->back()->with('error', 'Falha ao atualizar!');

        $title = "Voo {$flight->id}";

        return view('site.flights.show', compact('flight', 'title'));
    }
}
