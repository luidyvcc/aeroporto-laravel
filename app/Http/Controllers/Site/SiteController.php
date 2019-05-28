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

    public function search(Request $request, Flight $flight)
    {
        $title = 'Resultado da pesquisa';

        $request['origin'] = getInfoCity($request->origin);
        $request['destination'] = getInfoCity($request->destination);

        $flights = $flight->search($request);

        dd($flights);

        return view( 'site.flights.results.search', compact( 'title', 'flights' ) );
        
    }
}
