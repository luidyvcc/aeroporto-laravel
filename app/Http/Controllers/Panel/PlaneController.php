<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Requests\PlaneStoreUpdateFormRequest;
use App\Http\Controllers\Controller;
use App\Models\Plane;
use App\Models\Brand;

class PlaneController extends Controller
{
    private $plane;
    private $totalPage;

    public function __construct(Plane $plane)
    {
        $this->plane = $plane;
        $this->totalPage = 4;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Listagem de aviões";

        $planes = $this->plane->with('brand')->paginate($this->totalPage);

        return view('panel.planes.index', compact('title', 'planes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Novo avião';

        $bred = 'Cadastro de avião';

        $classes = $this->plane->classes();

        $brands = Brand::pluck('name', 'id');

        return view('panel.planes.create', compact('title', 'bred', 'classes', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlaneStoreUpdateFormRequest $request)
    {
        $dataForm = $request->all();

        $insert = $this->plane->create($dataForm);

        return ($insert) ?
            redirect()
                ->route('planes.index')
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
        // Busca a marca pelo id enviado por parametro
        $plane = $this->plane->find($id);
        // Se a consulta não retornar nenhum objeto, volte de onde veio
        if (!$plane) return redirect()->back();

        $title = "Editar {$plane->id}";

        $bred = "Edição da marca";

        $classes = $this->plane->classes();

        $brands = Brand::pluck('name', 'id');

        return view('panel.planes.edit', compact('title', 'plane', 'bred', 'classes', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlaneStoreUpdateFormRequest $request, $id)
    {
        // Busca a marca pelo id enviado por parametro
        $plane = $this->plane->find($id);
        // Se a consulta não retornar nenhum objeto, volte de onde veio
        if (!$plane) return redirect()->back();

        $update = $plane->update($request->all());

        return ($update) ?
            redirect()
                ->route('planes.index')
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
