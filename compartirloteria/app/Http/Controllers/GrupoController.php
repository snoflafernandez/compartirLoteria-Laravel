<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Boleto;
use App\GroupsHasUsers;

class GrupoController extends Controller
{
    public function getShow($id){
    	return view('grupo',array('id'=>$id));
    }

    public function addUser(){
        return view('user');
    }
    public function addBoleto(){
        return view('boleto');
    }

    public function getEdit($id){
    	return view('grupo',array('id'=>$id));

    	//aqui es donde va el middleware
    }

    public function getUsers()
    {
        $usuarios = User::whereIn('idusers',function($query){
            $query -> select('users_idusers')
                    ->from('groups_has_users')
                    ->where('groups_idgroups','=',auth()->user()->idgroups);
        })->get();

        $cuentas = GroupsHasUsers::where('groups_idgroups','=',auth()->user()->idgroups)->get();

        $boletos = Boleto::where('groups_idgroups','=',auth()->user()->idgroups)->get();

        return view('grupo',['arrayUsuarios'=>$usuarios,'cuentas'=>$cuentas,'arrayBoletos'=>$boletos]);
    }

    public function postCreateUser(request $request)
    {
    	$user = new User($request->all());
    	/*$user->dni=$request->input('dni');
    	$user->nombre=$request->input('nombre');
    	$user->apellidos=$request->input('apellidos');
    	$user->email=$request->input('email');
    	$user->fecha_nacimiento=$request->input('fecha_nacimiento');*/
        $user->save();
        $select = User::orderBy('idusers','DESC')->first();

        $groups_has_users = new GroupsHasUsers;
        $groups_has_users->groups_idgroups=$request->input('groups_idgroups');

        $groups_has_users->users_idusers=$select->idusers;
        $groups_has_users->save();
    	return redirect('/grupo/{id}');
    }
    
    public function postCreateBoleto(request $request)
    {
        $boleto = new Boleto($request->all());
        /*$boleto->numero=$request->input('numero');
        $boleto->numero_sorteo=$request->input('numero_sorteo');
        $boleto->serie=$request->input('serie');
        $boleto->fraccion=$request->input('fraccion');
        $boleto->precio=$request->input('precio');
        $boleto->fecha_sorteo=$request->input('fecha_sorteo');
        $boleto->participacion_user=$request->input('participacion_user');
        $boleto->foto_delante=$request->input('foto_delante');
        $boleto->foto_detras=$request->input('foto_detras');
        $boleto->groups_idgroups=$request->input('groups_idgroups');*/
        $boleto->save();
        return redirect('/grupo/{id}');
    }

}