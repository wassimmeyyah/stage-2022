<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use App\Models\Experimentation;
use App\Models\Thematique;
use App\Models\Groupethematique;
use App\Models\Palier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ExperimentationController extends Controller
{
    public function  show(Request $request){


        if(isset($request->Recherche)) {
            $searchValue = $request->Recherche;
            $experimentations = \App\Models\experimentation::where('EXPCode','LIKE', $searchValue . '%')->get();

        }else {
            $experimentations = \App\Models\experimentation::orderBy("EXPCode","asc")->paginate(10);

        }

        return view("experimentation", ["experimentations" => $experimentations]);
    }

    public function index()
    {
        $experimentation = Experimentation::all();

        return view('index', compact('experimentation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etablissements= Etablissement::all();
        $groupethematiques = Groupethematique::all();
        $thematiques  = Thematique::all();
        $paliers = Palier::all();

        return view('experimentationCreate', compact('etablissements','groupethematiques','thematiques','paliers'));
    }

    public function up(Experimentation $experimentation)
    {
        return view('experimentationUpdate', compact("experimentation"));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $etablissements= Etablissement::all();
        $groupethematiques = Groupethematique::all();
        $thematiques  = Thematique::all();
        $paliers = Palier::all();

        $res = DB::table('experimentation')->insert([
            'EXPCode' => $_POST['EXPCode'],
            'EXPTitre' => $_POST['EXPTitre'],
            'EXPLienInternet' => $_POST['EXPLienInternet'],
            'EXPLienDrive' => $_POST['EXPLienDrive'],
            'EXPDateDebut' => $_POST['EXPDateDebut'],
            'ETABCode' => $_POST['ETABCode'],
            'GTCode' => $_POST['GTCode'],
            'THEMACode' => $_POST['THEMACode'],
            'PALCode' => $_POST['PALCode']


        ]);


        return redirect('/experimentation')->with("successAjout", "l'experimentation' '$request->EXPTitre'a été ajouté avec succès");
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
        $etablissements= Etablissement::all();
        $groupethematiques = Groupethematique::all();
        $thematiques  = Thematique::all();
        $paliers = Palier::all();

        $experimentation = Experimentation::findOrFail($id);
        return view('experimentationUpdate', compact("experimentation",'etablissements','groupethematiques','thematiques','paliers'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experimentation $experimentation)
    {




        $experimentation->delete($experimentation);

        $experimentation->insert([
            'EXPCode' => $_POST['EXPCode'],
            'EXPTitre' => $_POST['EXPTitre'],
            'EXPLienInternet' => $_POST['EXPLienInternet'],
            'EXPLienDrive' => $_POST['EXPLienDrive'],
            'EXPDateDebut' => $_POST['EXPDateDebut'],
            'ETABCode' => $_POST['ETABCode'],
            'GTCode' => $_POST['GTCode'],
            'THEMACode' => $_POST['THEMACode'],
            'PALCode' => $_POST['PALCode']
        ]);

        return redirect('/experimentation')->with("successModify", "L'experimentation' '$request->EXPTitre' a été mis à jour avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Experimentation $experimentation)
    {
        $nometab = $experimentation->EXPTitre;
        $experimentation>delete();

        return back()->with("successDelete", "L'experimentation' '$nometab' a été supprimé avec succèss");
    }

    public function search(){
        $q = request()->input('q');
        $experimentations = Experimentation::where('EXPCode','like',"%$q%")
            ->orWhere('EXPTitre','like',"%$q%")
            ->orWhere('ETABCode','like',"%$q%")
            ->get();

        return view('experimentationSearch')->with('experimentation', $experimentations);
    }

    public function affiche($id2){

        $etablissements= Etablissement::all();
        $groupethematiques = Groupethematique::all();
        $thematiques  = Thematique::all();
        $paliers = Palier::all();

        $experimentation = Experimentation::find($id2);

        return view("experimentationAffichage", compact("experimentation",'etablissements','groupethematiques','thematiques','paliers'));
    }




    public function telechargerPdf($id3){

        $etablissements= Etablissement::all();
        $groupethematiques = Groupethematique::all();
        $thematiques  = Thematique::all();
        $paliers = Palier::all();

        $experimentation = Experimentation::findOrFail($id3);

        $pdf = PDF::loadView('telechargement4', compact("experimentation",'etablissements','groupethematiques','thematiques','paliers'));
        return $pdf->download('telechargement4.pdf');
    }
}

