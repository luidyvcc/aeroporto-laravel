<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Flight;
use App\Models\Plane;
use App\Models\Airport;

class FlightController extends Controller
{
    private $flight;
    private $totalPage;

    public function __construct(Flight $flight)
    {
        $this->flight = $flight;
        $this->totalPage = 4;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Lista de Voos';
        $bred = 'Voos';

        $flights = $this->flight->getItems($this->totalPage);

        return view('panel.flights.index', compact('title','flights', 'bred'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Cadastro de voo";
        $bred = "";

        $planes = Plane::pluck('id', 'id');
        $airports = Airport::pluck('name', 'id');

        return view('panel.flights.create', compact('title','bred', 'airports', 'planes' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insert = $this->flight->storeFlight($request);

        return ($insert) ?
            redirect()
                ->route('flights.index')
                ->with('success', 'Cadastrado com sucesso!'):
            redirect()
                ->back()
                ->with('error', 'Falha ao cadastrar!')
                ->withInput();//Volta a pagina com as informações preenchidas
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
        $flight = $this->flight->find($id);
        if(!$flight) return redirect()->back()->with('error', 'Falha ao atualizar!');

        $planes = Plane::pluck('id', 'id');
        $airports = Airport::pluck('name', 'id');

        $title = "Editar voo {$flight->id}";
        $bred = "Editar";

        return view('panel.flights.edit', compact('flight', 'title', 'bred', 'planes', 'airports'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $flight = $this->flight->find($id);
        if(!$flight) return redirect()->back()->with('error', 'Falha ao atualizar!');

        $update = $flight->updateFlight($request);

        return ($update) ?
            redirect()
                ->route('flights.index')
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
    public function destroy($id)
    {
        //
    }
}