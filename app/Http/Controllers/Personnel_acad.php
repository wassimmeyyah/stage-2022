<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Personnel_acad extends Controller
{
    public function  show(Request $request){
        
        if(isset($request->Recherche)) {
            $searchValue = $request->Recherche;
            $personnel_acads = \App\Models\Personnel_acad::where('PORTCode','LIKE', $searchValue . '%')->get();
            //return view("viewpersonnel_acad", ["personnel_acads" => $personnel_acads]);
        }else {
            $personnel_acads = \App\Models\personnel_acad::orderBy("PORTCode","asc")->paginate(10);
            //return view("personnel_acad", ["personnel_acads" => $personnel_acads]);
        }

        return view("personnel_acad", ["personnel_acads" => $personnel_acads]);}

    public function index()
    {
        // $personnel_acad = Personnel_acad::all();

        return view('index', compact('personnel_acad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personnel_acadCreate');
    }

    public function up(personnel_acad $personnel_acad)
    {
        return view('personnel_acadUpdate', compact("personnel_acad"));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $res = DB::table('personnel_acad')->insert([
            'PORTCode' => $_POST['PORTCode'],
            'PORTNom' => $_POST['PORTNom'],
            'PORTMail' => $_POST['PORTMail'],
            'PORTTel' => $_POST['PORTTel'],
            'ETABCode' => $_POST['ETABCode']
        ]);


        return redirect('/personnel_acad')->with("successAjout", "le personnel_acad' '$request->PORTNom'a été ajouté avec succès");
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
        // $personnel_acad = Personnel_acad::findOrFail($id);
        return view('personnel_acadUpdate', compact("personnel_acad"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, personnel_acad $personnel_acad)
    {




        $personnel_acad->delete($personnel_acad);

        $personnel_acad->insert([
            'PORTCode' => $_POST['PORTCode'],
            'PORTNom' => $_POST['PORTNom'],
            'PORTMail' => $_POST['PORTMail'],
            'PORTTel' => $_POST['PORTTel'],
            'ETABCode' => $_POST['ETABCode']
        ]);

        return redirect('/personnel_acad')->with("successModify", "Le personnel_acad' '$request->PORTNom' a été mise à jour avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(personnel_acad $personnel_acad)
    {
        $nomPORT = $personnel_acad->PORTNom;
        // $personnel_acad->delete();

        return back()->with("successDelete", "Le personnel_acad' '$nomPORT' a été supprimé avec succèss");
    }

}
