<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\UserStoreUpdateFormRequest;
use App\Http\Requests\UserUpdateProfileFormRequest;


class UserController extends Controller
{

    private $user;
    private $totalPage;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->totalPage = 4;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Lista de usuários';

        $users = $this->user->paginate($this->totalPage);

        return view('panel.users.index', compact('title','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Novo usuário';

        return view('panel.users.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\UserStoreUpdateFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreUpdateFormRequest $request)
    {
        $nameFile = "";
        if ( $request->hasFile('image') && $request->file('image')->isValid() ) {
            
            $nameFile = uniqid(date('HisYmd')).".".$request->image->extension();

            if ( !$request->image->storeAs('users', $nameFile) ) {
                redirect()
                ->back()
                ->with('error', 'Falha no upload!')
                ->withInput();
            } 
        }

        $insert = $this->user->storeUser($request, $nameFile);

        return ($insert) ?
            redirect()
                ->route('users.index')
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
         $user = $this->user->find($id);
         if (!$user) return redirect()->back();
 
         $title = "Detalhes do usuário {$user->name}";
 
         return view('panel.users.show', compact('title', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user->find($id);
        if(!$user) return redirect()->back()->with('error', 'Falha ao atualizar!');

        $title = "Editar usuário '{$user->name}'";

        return view('panel.users.edit', compact('user', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UserStoreUpdateFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserStoreUpdateFormRequest $request, $id)
    {       
        $user = $this->user->find($id);
        if(!$user) return redirect()->back()->with('error', 'Falha ao atualizar!');

        $nameFile = $user->image;
        if ( $request->hasFile('image') && $request->file('image')->isValid() ) {
            
            if($user->image) $nameFile = $user->image;
            else $nameFile = uniqid(date('HisYmd')).".".$request->image->extension();

            if ( !$request->image->storeAs('users', $nameFile) ) {
                redirect()
                ->back()
                ->with('error', 'Falha no upload!')
                ->withInput();
            } 

        }     

        $update = $user->updateUser($request, $nameFile);

        return ($update) ?
            redirect()
                ->route('users.index')
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
        $user = $this->user->find($id);
        if (!$user) return redirect()->back()->with('error', 'Falha ao deletar!');

        $delete = $user->delete();

        return ($delete) ?
            redirect()
                ->route('users.index')
                ->with('success', 'Deletado com sucesso!'):
            redirect()
                ->back()
                ->with('error', 'Falha ao deletar!');
    }

    public function search(Request $request)
    {
        $searchForm = $request->except(['_token']);

        $users = $this->user->search($request, $this->totalPage);
        
        $title = "Resultado da pesquisa por";

        return view('panel.users.index', compact('title','users', 'searchForm'));
    }

    public function myProfile()
    {
        $title = "Meu perfil";

        $user = auth()->user();

        return view("site.users.my-profile", compact('title', 'user'));
    }

    public function updateProfile(UserUpdateProfileFormRequest $request)
    {
        $user = auth()->user();

        $user->name = $request->name;

        if ( $request->password ) $user->password = bcrypt($request->password);

        if ( $request->hasFile('image') && $request->file('image')->isValid() ) {

            if ( $user->image ) $nameFile = $user->image;
            else $nameFile = $user->id.'_'.kebab_case($user->name).'.'.$request->image->extension();

            if ( !$request->image->storeAs('users', $nameFile) ) {
                return 
                redirect()
                ->back()
                ->with('error', 'Falha ao carregar imagem!');
            }else{
                $user->image = $nameFile;
            }

        }

        $update = $user->save();

        return ($update) ?
            redirect()
                ->route('site.user.profile')
                ->with('success', 'Atualizado com sucesso!'):
            redirect()
                ->back()
                ->with('error', 'Falha ao atualizar!');
    }

}
