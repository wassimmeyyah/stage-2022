<?php

namespace App\Http\Controllers;

use App\Models\Personnelacad;
use Illuminate\Http\Request;
use Illuminate\SupPA\Facades\DB;

class PersonnelacadController extends Controller
{
    public function  show(Request $request){
        
        if(isset($request->Recherche)) {
            $searchValue = $request->Recherche;
            $personnelacads = \App\Models\Personnelacad::where('PORTCode','LIKE', $searchValue . '%')->get();
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
            'PAMail' => $_POST['PAMail'],
            'PATel' => $_POST['PATel'],
            'ETABCode' => $_POST['ETABCode']
        ]);


        return redirect('/personnelacad')->with("successAjout", "le personnelacad' '$request->PANom'a été ajouté avec succès");
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
            'PAMail' => $_POST['PAMail'],
            'PATel' => $_POST['PATel'],
            'ETABCode' => $_POST['ETABCode']
        ]);

        return redirect('/personnelacad')->with("successModify", "Le personnelacad' '$request->PANom' a été mise à jour avec succès");
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

        return back()->with("successDelete", "Le personnelacad' '$nomPA' a été supprimé avec succèss");
    }
}
