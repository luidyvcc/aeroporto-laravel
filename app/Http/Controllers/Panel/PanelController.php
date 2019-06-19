<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Airport;
use App\Models\Brand;
use App\Models\City;
use App\Models\Flight;
use App\Models\Plane;
use App\Models\Reserve;
use App\Models\State;
use App\User;

class PanelController extends Controller
{
    public function index(){

        $totais = [
            ['icon' => 'fa fa-thumb-tack', 'title' => 'Aeroportos', 'total' => Airport::count()],
            ['icon' => 'fa fa-university', 'title' => 'Marcas', 'total' => Brand::count()],
            ['icon' => 'fa fa-map-marker', 'title' => 'Cidades', 'total' => City::count()],
            ['icon' => 'fa fa-fighter-jet', 'title' => 'Voos', 'total' => Flight::count()],
            ['icon' => 'fa fa-plane', 'title' => 'Aviões', 'total' => Plane::count()],
            ['icon' => 'fa fa-check-square', 'title' => 'Reservas', 'total' => Reserve::count()],
            ['icon' => 'fa fa-globe', 'title' => 'Estados', 'total' => State::count()],
            ['icon' => 'fa fa-users', 'title' => 'Usuários', 'total' => User::count()],
        ];

        return view('panel.home.index', compact('totais'));
    }
}
