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

        $bred = "Aeroportos de {$city->name}";

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

        $bred = 'Cadastro de aeroporto';

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
    public function show($city_id, $id)
    {
        $airport = Airport::where('id', $id)->get()->first();
        if(!$airport) return redirect()->back()->with('error', 'Erro ao localizar aeroporto!');

        $city = $this->city->find($city_id);
        if (!$city) return redirect()->back()->with('error', 'Falha ao buscar cidade!');

        $title = "Detalhes";
        $bred = "Detalhes do aeroporto '{$airport->name}'";

        return view('panel.airports.show', compact('title', 'bred', 'city', 'airport'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($cityId, $id)
    {
        $airport = $this->airport->with('city')->find($id);
        if (!$airport) return redirect()->back()->with('error', 'Falha ao buscar aeroporto!');

        $city = $airport->city;

        $cities = $this->city->pluck('name', 'id');

        $title = "Editar aeroporto '{$airport->name}'";

        $bred = "Edição de aeroporto";

        return view('panel.airports.edit', compact('airport', 'city', 'cities', 'title', 'bred'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\AirportStoreUpdateFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AirportStoreUpdateFormRequest $request, $cityId, $id)
    {
        $airport = $this->airport->find($id);
        if (!$airport) return redirect()->back()->with('error', 'Falha ao buscar aeroporto!');

        $update = $airport->update($request->all());

        return ($update) ?
            redirect()
                ->route('airports.index', $cityId)
                ->with('success', 'Atualizado com sucesso!'):
            redirect()
                ->back()
                ->with('error', 'Falha ao atualizar!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function destroy($cityId, $id)
    {
        $airport = $this->airport->find($id);
        if (!$airport) return redirect()->back()->with('error', 'Falha ao buscar aeroporto!');

        $delete = $airport->delete();

        return ($delete) ?
            redirect()
                ->route('airports.index', $cityId)
                ->with('success', 'Deletado com sucesso!'):
            redirect()
                ->back()
                ->with('error', 'Falha ao deletar!');
    }
}
