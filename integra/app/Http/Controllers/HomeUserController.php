<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Redirect;

class HomeUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;

        $user = User::find($id);
        if($user->status == '0'){
            Auth::logout();
            return Redirect::route('welcome')->with('message', 'Aguarde aprovação');
        }
        return view('home', compact('user'));
    }


    public function perfilIndex()
    {
        $var = Auth::guard('web')->user()->makeVisible('attribute')->toArray();

        $id = $var['id'];

        $user = User::find($id);  
        return view('user.perfil.perfil', compact('user'));
    }


    public function perfilIndexUpdate(Request $request)
    {
        $var = Auth::guard('web')->user()->makeVisible('attribute')->toArray();
        $id = $var['id'];
        $perfilaluno = PerfilAluno::where('id_aluno',$id)->first();
        $perfilaluno->periodo = $request->periodo;
        $perfilaluno->idade = $request->idade;
        $perfilaluno->telefone = $request->telefone;
        $perfilaluno->estado = $estado->estado;
        $perfilaluno->cidade = $estado->cidade;
        $perfilaluno->bairro = $request->bairro;


        return view('user.perfil.perfil', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
