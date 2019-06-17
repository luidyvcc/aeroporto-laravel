<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\User;
use App\Models\Flight;
use App\Models\Airport;
use App\Models\Reserve;
use App\Http\Requests\ReserveStoreFormRequest;

class SiteController extends Controller
{

    private $totalPage;

    public function __construct()
    {
        $this->totalPage = 4;
    }

    public function index()
    {
        $title = 'Principal';

        $airports = Airport::with('city')->get();

        return view('site.home.index', compact('title', 'airports'));
    }

    public function promotions(Flight $flight)
    {
        $title = 'Promoções';

        $flightsPromotion = $flight->getFlightsPromotion();

        return view('site.promotions.list', compact('title', 'flightsPromotion'));
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
        if( !$flight ) return redirect()->back()->with('error', 'Falha ao localizar!');

        $title = "Voo {$flight->id}";

        return view('site.flights.show', compact('flight', 'title'));
    }

    public function flightReserve(ReserveStoreFormRequest $request, Reserve $reserve)
    {
        $insert = $reserve->siteSaveReserve($request->flight_id);

        return ($insert) ?
        redirect()
            ->route('site.user.purchases')
            ->with('success', 'Cadastrado com sucesso!'):
        redirect()
            ->back()
            ->with('error', 'Falha ao cadastrar!')
            ->withInput();//Volta a pagina com as informações preenchidas
    }

    public function myPurchases()
    {
        $title = "Minhas reservas";

        $reserves = auth()->user()->userReservations();
        if( !$reserves ) return redirect()->back()->with('error', 'Falha ao localizar!');

        return view('site.users.purchases', compact('title', 'reserves'));
    }

    public function myProfile()
    {
        dd('Meu perfil');
    }

    public function detailPurchases($flightId)
    {
        $reserve = Reserve::with(['flight'])
        ->where('user_id', auth()->user()->id)
        ->where('flight_id', $flightId)
        ->get()->first();
        if( !$reserve ) return redirect()->back()->with('error', 'Falha ao localizar!');

        $flight = Flight::with(['origin','destination'])->find($reserve->flight->id);
        if( !$flight ) return redirect()->back()->with('error', 'Falha ao localizar!');

        $title = "Voo {$flight->id}";

        return view('site.users.detail-purchase', compact('flight', 'title'));
    }

}
