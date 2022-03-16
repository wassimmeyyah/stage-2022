<?php

namespace App\Http\Controllers;

use App\Models\Personnelacad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonnelacadController extends Controller
{
    public function  show(Request $request){

        if(isset($request->Recherche)) {
            $searchValue = $request->Recherche;
            $personnelacads = \App\Models\Personnelacad::where('PACode','LIKE', $searchValue . '%')->get();
            //return view("viewPersonnelacad", ["personnelacads" => $personnelacads]);
        }else {
            $personnelacads = \App\Models\Personnelacad::orderBy("PACode","asc")->paginate(10);
            //return view("personnelacad", ["personnelacads" => $personnelacads]);
        }

        return view("personnelacad", ["personnelacads" => $personnelacads]);}

    public function index()
    {
        $personnelacad = Personnelacad::all();

        return view('index', compact('personnelacad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personnelacadCreate');
    }

    public function up(Personnelacad $personnelacad)
    {
        return view('personnelacadUpdate', compact("personnelacad"));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $res = DB::table('personnelacad')->insert([
            'PACode' => $_POST['PACode'],
            'PANom' => $_POST['PANom'],
            'PAPrenom' => $_POST['PAPrenom'],
            'PAMail' => $_POST['PAMail'],
            'PADiscipline' => $_POST['PADiscipline'],
            'PAAdressePerso' => $_POST['PAAdressePerso'],
            'PATel' => $_POST['PATel'],
            'ETABCode' => $_POST['ETABCode']
        ]);


        return redirect('/personnelacad')->with("successAjout", "la personne' '$request->PANom'a été ajoutée avec succès");
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
        $personnelacad = Personnelacad::findOrFail($id);
        return view('personnelacadUpdate', compact("personnelacad"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personnelacad $personnelacad)
    {




        $personnelacad->delete($personnelacad);

        $personnelacad->insert([
            'PACode' => $_POST['PACode'],
            'PANom' => $_POST['PANom'],
            'PAPrenom' => $_POST['PAPrenom'],
            'PAMail' => $_POST['PAMail'],
            'PADiscipline' => $_POST['PADiscipline'],
            'PAAdressePerso' => $_POST['PAAdressePerso'],
            'PATel' => $_POST['PATel'],
            'ETABCode' => $_POST['ETABCode']
        ]);

        return redirect('/personnelacad')->with("successModify", "La personne' '$request->PANom' a été mise à jour avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Personnelacad $personnelacad)
    {
        $nomPA = $personnelacad->PANom;
        $personnelacad->delete();

        return back()->with("successDelete", "La personne' '$nomPA' a été supprimée avec succèss");
    }

    public function search(){
        $q = request()->input('q');
        $personnelacads = Personnelacad::where('PACode','like',"%$q%")
            ->orWhere('PANom','like',"%$q%")
            ->orWhere('PAPrenom','like',"%$q%")
            ->orWhere('PAMail','like',"%$q%")
            ->orWhere('PAdiscipline', 'like',"%$q%")
            ->orWhere('PAAdressePerso','like',"%$q%")
            ->orWhere('PATel','like',"%$q%")
            ->orWhere('ETABCode','like',"%$q%")
            ->get();

        return view('personnelacadSearch')->with('personnelacad', $personnelacads);
    }
}
