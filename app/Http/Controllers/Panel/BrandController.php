<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Http\Requests\BrandStoreUpdateFormRequest;

class BrandController extends Controller
{
    private $brand;
    private $totalPage;

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
        $this->totalPage = 4;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Lista de marcas';

        $brands = $this->brand->paginate($this->totalPage);

        return view('panel.brands.index', compact('title','brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Nova marca';

        $bred = 'Cadastro de marca';

        return view('panel.brands.form', compact('title', 'bred'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandStoreUpdateFormRequest $request)
    {
        $dataForm = $request->all();

        $insert = $this->brand->create($dataForm);

        return ($insert) ?
            redirect()
                ->route('brands.index')
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
        // Busca a marca pelo id enviado por parametro
        $brand = $this->brand->find($id);
        // Se a consulta não retornar nenhum objeto, volte de onde veio
        if (!$brand) return redirect()->back();

        $title = "Detalhes da marca {$brand->name}";
        $bred = "Detalhe da marca";

        return view('panel.brands.show', compact('title', 'brand', 'bred'));
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
        $brand = $this->brand->find($id);
        // Se a consulta não retornar nenhum objeto, volte de onde veio
        if (!$brand) return redirect()->back();

        $title = "Editar {$brand->name}";
        $bred = "Edição da marca";

        return view('panel.brands.form', compact('title', 'brand', 'bred'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandStoreUpdateFormRequest $request, $id)
    {
        // Busca a marca pelo id enviado por parametro
        $brand = $this->brand->find($id);
        // Se a consulta não retornar nenhum objeto, volte de onde veio
        if (!$brand) return redirect()->back();

        $update = $brand->update($request->all());

        return ($update) ?
            redirect()
                ->route('brands.index')
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
        // Busca a marca pelo id enviado por parametro
        $brand = $this->brand->find($id);
        // Se a consulta não retornar nenhum objeto, volte de onde veio
        if (!$brand) return redirect()->back()->with('error', 'Falha ao deletar!');

        $delete = $brand->delete();

        return ($delete) ?
            redirect()
                ->route('brands.index')
                ->with('success', 'Deletado com sucesso!'):
            redirect()
                ->back()
                ->with('error', 'Falha ao deletar!');
    }

    public function search(Request $request)
    {
        $searchForm = $request->except(['_token']);

        $brands = $this->brand->search($request->key_search, $this->totalPage);
        
        $title = "Resultado da pesquisa por: {$request->key_search}";

        return view('panel.brands.index', compact('title','brands', 'searchForm'));
    }

}
