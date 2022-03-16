<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EtablissementController extends Controller
{

    public function  show(Request $request){
        //$msg = "Hello";
        //ddd($msg);
        //$etablissement=Etablissement::where('ETABCode',' 0690076H ')->first();
        //ddd($etablissement->ETABCode);
        //ddd($etablissement->getKey());

        if(isset($request->Recherche)) {
            $searchValue = $request->Recherche;
            $etablissements = \App\Models\etablissement::where('ETABCode','LIKE', $searchValue . '%')->get();
            //return view("viewEtablissement", ["etablissements" => $etablissements]);
        }else {
            $etablissements = \App\Models\etablissement::orderBy("ETABCode","asc")->paginate(10);
            //return view("etablissement", ["etablissements" => $etablissements]);
        }

        return view("etablissement", ["etablissements" => $etablissements]);
    }

    public function index()
    {
        $etablissement = etablissement::all();

        return view('index', compact('etablissement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('etablissementCreate');
    }

    public function up(Etablissement $etablissement)
    {
        return view('etablissementUpdate', compact("etablissement"));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $res = DB::table('etablissement')->insert([
            'ETABCode' => $_POST['ETABCode'],
            'ETABNom' => $_POST['ETABNom'],
            'ETABMail' => $_POST['ETABMail'],
            'ETABChef' => $_POST['ETABChef'],
            'ETABAdresse' => $_POST['ETABAdresse'],
            'ETABTel' => $_POST['ETABTel'],
            'TERRCode' => $_POST['TERRCode'],
            'TYPCode' => $_POST['TYPCode'],
            'SPECode' => $_POST['SPECode'],
            'VILCode' => $_POST['VILCode']


        ]);


        return redirect('/etablissement')->with("successAjout", "l'etablissement' '$request->ETABNom'a été ajouté avec succès");
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
        $etablissement = Etablissement::findOrFail($id);
        return view('etablissementUpdate', compact("etablissement"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etablissement $etablissement)
    {




        $etablissement->delete($etablissement);

        $etablissement->insert([
            'ETABCode' => $_POST['ETABCode'],
            'ETABNom' => $_POST['ETABNom'],
            'ETABMail' => $_POST['ETABMail'],
            'ETABChef' => $_POST['ETABChef'],
            'ETABAdresse' => $_POST['ETABAdresse'],
            'ETABTel' => $_POST['ETABTel'],
            'TERRCode' => $_POST['TERRCode'],
            'TYPCode' => $_POST['TYPCode'],
            'SPECode' => $_POST['SPECode'],
            'VILCode' => $_POST['VILCode']
        ]);

        return redirect('/etablissement')->with("successModify", "L'etablissement' '$request->ETABNom' a été mise à jour avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Etablissement $etablissement)
    {
        $nometab = $etablissement->ETABNom;
        $etablissement->delete();

        return back()->with("successDelete", "L'etablissement' '$nometab' a été supprimé avec succèss");
    }

    public function search(){
        $q = request()->input('q');
        $etablissements = Etablissement::where('ETABCode','like',"%$q%")
            ->orWhere('ETABNom','like',"%$q%")
            ->orWhere('ETABMail','like',"%$q%")
            ->orWhere('ETABChef','like',"%$q%")
            ->orWhere('ETABAdresse','like',"%$q%")
            ->orWhere('ETABTel','like',"%$q%")
            ->orWhere('TERRCode','like',"%$q%")
            ->orWhere('TYPCode','like',"%$q%")
            ->orWhere('SPECode','like',"%$q%")
            ->orWhere('VILCode','like',"%$q%")
            ->get();

        return view('etablissementSearch')->with('etablissement', $etablissements);
    }
}
