<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\State;

class StateController extends Controller
{
    private $state;
    private $totalPage;

    public function __construct(State $state)
    {
        $this->state = $state;
        $this->totalPage = 4;
    }

    public function index()
    {
        $states = $this->state->paginate($this->totalPage);

        $title = "Estados";

        $bred = 'Estados';

        return view('panel.states.index', compact('states','title','bred'));
    }

    public function search(Request $request)
    {
        $searchForm = $request->except(['_token']);

        $states = $this->state->search($request->key_search, $this->totalPage);
        
        $title = "Resultado da pesquisa por: {$request->key_search}";

        $bred = "Estados";

        return view('panel.states.index', compact('title','states', 'searchForm', 'bred'));
    }
}
