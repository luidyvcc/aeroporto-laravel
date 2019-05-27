<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Requests\ReserveStoreFormRequest;
use App\Http\Controllers\Controller;
use App\Models\Reserve;
use App\Models\Flight;
use App\User;

class ReserveController extends Controller
{
    private $reserve;
    private $totalPage;

    public function __construct(Reserve $reserve)
    {
        $this->reserve = $reserve;
        $this->totalPage = 4;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Lista de Reservas';

        $reserves = $this->reserve->with(['user', 'flight.destination', 'flight.origin'])->paginate($this->totalPage);

        $flights = Flight::pluck('id', 'id');
        $flights->prepend('Todos Voos', '');

        $users = User::pluck('name', 'id');
        $users->prepend('Todos Usuários', '');

        $statuses = $this->reserve->statuses();
        $statuses[null] = 'Todos Status';

        return view('panel.reserves.index', compact('title', 'reserves', 'flights', 'users', 'statuses' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Cadastro de reserva";

        $flights = Flight::pluck('id', 'id');
        $users = User::pluck('name', 'id');
        $statuses = $this->reserve->statuses();

        return view('panel.reserves.create', compact( 'title', 'flights', 'users', 'statuses' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ReserveStoreFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReserveStoreFormRequest $request)
    {
        $insert = $this->reserve->create( $request->all() );

        return ($insert) ?
            redirect()
                ->route('reserves.index')
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
        $reserve = $this->reserve->with(['user', 'flight'])->find($id);
        if(!$reserve) return redirect()->back()->with('error', 'Falha ao atualizar');
        
        $user = $reserve->user;
        $flight = $reserve->flight;
        $statuses = $this->reserve->statuses();
        
        $title = "Editar reserva {$reserve->id} do usuário {$user->name}";

        return view('panel.reserves.edit', compact('reserve', 'user', 'flight', 'title', 'statuses'));
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
        $reserve = $this->reserve->find($id);
        if(!$reserve) return redirect()->back()->with('error', 'Falha ao atualizar');

        $updateStatus = $reserve->updateStatus($request->status);

        return $updateStatus ?
            redirect()
                ->route('reserves.index')
                ->with('success', 'Atualizado com sucesso!') :
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

    public function search(Request $request)
    {
        $title = "Resultado da Pesquisa";

        $reserves = $this->reserve->search($request, $this->totalPage);

        $flights = Flight::pluck('id', 'id');
        $flights->prepend('Todos Voos', '');

        $users = User::pluck('name', 'id');
        $users->prepend('Todos Usuários', '');

        $statuses = $this->reserve->statuses();
        $statuses[null] = 'Todos Status';

        $searchForm = $request->except(['_token']);

        return view('panel.reserves.index', compact('title', 'reserves', 'flights', 'users', 'statuses', 'searchForm' ));
    }
}
