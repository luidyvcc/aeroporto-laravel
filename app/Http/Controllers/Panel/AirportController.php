<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\AirportStoreUpdateFormRequest;
use App\Http\Controllers\Controller;
use App\Models\Airport;
use App\Models\City;

class AirportController extends Controller
{
    private $airport;
    private $city;
    private $totalPage;

    public function __construct(City $city, Airport $airport)
    {
        $this->city = $city;
        $this->airport = $airport;
        $this->totalPage = 4;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cityId)
    {
        $city = $this->city->find($cityId);
        if (!$city) return redirect()->back()->with('error', 'Falha ao buscar cidade!');

        $airports = $city->airports()->paginate($this->totalPage);
        if (!$city) return redirect()->back()->with('error', 'Falha ao buscar aeroporto!');

        $title = "Lista de aeroportos de {$city->name}";

        $bred = "Aeroportos";

        return view('panel.airports.index', compact('city', 'title', 'bred', 'airports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cityId)
    {
        $city = $this->city->find($cityId);
        if (!$city) return redirect()->back()->with('error', 'Falha ao buscar cidade!');

        $cities = $this->city->pluck('name', 'id');

        $title = 'Novo aeroporto';

        $bred = 'Cadastro';

        return view('panel.airports.create', compact('title', 'bred', 'city', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\AirportStoreUpdateFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AirportStoreUpdateFormRequest $request, $cityId)
    {
        $city = $this->city->find($cityId);
        if (!$city) return redirect()->back()->with('error', 'Falha ao buscar cidade!');

        $dataForm = $request->except('_token');

        $insert = $this->airport->create($dataForm);

        return ($insert) ?
            redirect()
                ->route('airports.index', $dataForm['city_id'])
                ->with('success', 'Cadastrado com sucesso!'):
            redirect()
                ->back()
                ->with('error', 'Falha ao cadastrar!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\AirportStoreUpdateFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AirportStoreUpdateFormRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
