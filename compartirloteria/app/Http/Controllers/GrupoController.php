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
        $boleto->save();
        return redirect('/grupo/{id}');
    }

    public function generatePDF()
    {
        $data = User::whereIn('idusers',function($query){
            $query -> select('users_idusers')
                    ->from('groups_has_users')
                    ->where('groups_idgroups','=',auth()->user()->idgroups);
        })->get();
        $pdf = \PDF::loadView('pdf',compact('data'));
        $nombre = auth()->user()->nombre;
        $pdf->save(storage_path()."contrato-".$nombre.".pdf");
        return $pdf->stream(storage_path()."contrato-".$nombre.".pdf");

        /*$ruta = "/archivos";
        $nombre = auth()->user()->nombre;
        $archivo = "contrato-".$nombre.".pdf";
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents($ruta.$archivo, $output);*/
    }

}