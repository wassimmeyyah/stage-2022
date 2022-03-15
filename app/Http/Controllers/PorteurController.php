<?php

namespace App\Http\Controllers;

use App\Models\Porteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PorteurController extends Controller
{
    public function  show(Request $request){
        
        if(isset($request->Recherche)) {
            $searchValue = $request->Recherche;
            $porteurs = \App\Models\porteur::where('PORTCode','LIKE', $searchValue . '%')->get();
            //return view("viewporteur", ["porteurs" => $porteurs]);
        }else {
            $porteurs = \App\Models\porteur::orderBy("PORTCode","asc")->paginate(10);
            //return view("porteur", ["porteurs" => $porteurs]);
        }

        return view("porteur", ["porteurs" => $porteurs]);}

    public function index()
    {
        $porteur = porteur::all();

        return view('index', compact('porteur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('porteurCreate');
    }

    public function up(porteur $porteur)
    {
        return view('porteurUpdate', compact("porteur"));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $res = DB::table('porteur')->insert([
            'PORTCode' => $_POST['PORTCode'],
            'PORTNom' => $_POST['PORTNom'],
            'PORTMail' => $_POST['PORTMail'],
            'PORTTel' => $_POST['PORTTel'],
            'ETABCode' => $_POST['ETABCode']
        ]);


        return redirect('/porteur')->with("successAjout", "le porteur' '$request->PORTNom'a été ajouté avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $porteur = porteur::findOrFail($id);
        return view('porteurUpdate', compact("porteur"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, porteur $porteur)
    {




        $porteur->delete($porteur);

        $porteur->insert([
            'PORTCode' => $_POST['PORTCode'],
            'PORTNom' => $_POST['PORTNom'],
            'PORTMail' => $_POST['PORTMail'],
            'PORTTel' => $_POST['PORTTel'],
            'ETABCode' => $_POST['ETABCode']
        ]);

        return redirect('/porteur')->with("successModify", "Le porteur' '$request->PORTNom' a été mise à jour avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Porteur $porteur)
    {
        $nomPORT = $porteur->PORTNom;
        $porteur->delete();

        return back()->with("successDelete", "Le porteur' '$nomPORT' a été supprimé avec succèss");
    }
}
