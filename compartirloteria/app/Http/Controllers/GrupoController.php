<?php

namespace App\Http\Controllers;

use PDF;
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
        $request->foto_delante->move(public_path("images/").auth()->user()->idgroups."/tmp/");
        $request->foto_detras->move(public_path("images/").auth()->user()->idgroups."/tmp/");
        $boleto->save();
        return redirect('/grupo/{id}');
    }

    public function generatePDF( Request $request)
    {
        //https://hackthestuff.com/article/laravel6-add-digital-signature-certification-in-pdf

        $nombre = auth()->user()->nombre;
        $data = User::whereIn('idusers',function($query){
            $query -> select('users_idusers')
                    ->from('groups_has_users')
                    ->where('groups_idgroups','=',auth()->user()->idgroups);
        })->get();
        $boletos = Boleto::where('groups_idgroups','=',auth()->user()->idgroups)->get();
        // set certificate file
        $certificate = 'file://'.public_path("certificados/").'certificado_alfonso.crt';
        // set additional information in the signature
        $info = array(
            'Name' => 'TCPDF',
            'Location' => 'Office',
            'Reason' => 'Testing TCPDF',
            'ContactInfo' => 'http://www.tcpdf.org',
        );
        // set document signature
        PDF::setSignature($certificate, $certificate, 'tcpdfdemo', '', 2, $info);    
        PDF::SetFont('helvetica', '', 12);
        PDF::SetTitle("contrato-".$nombre);
        PDF::AddPage();
        // print a line of text
        $text = view('pdf',compact('data','boletos'));
        // add view content
        PDF::writeHTML($text, true, 0, true, 0);
        // add image for signature
        PDF::Image('tcpdf.png', 180, 60, 15, 15, 'PNG');
        // define active area for signature appearance
        PDF::setSignatureAppearance(180, 60, 15, 15);   
        // save pdf file
        PDF::Output(public_path("almacenamiento/")."contrato-".$nombre.".pdf", 'F');
        PDF::reset();
        dd('please reload');
    }

}