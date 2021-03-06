<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use App\Models\Specialite;
use App\Models\Territoire;
use App\Models\Type;
use App\Models\Ville;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use pdf;

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
        $territoires= Territoire::all();
        $types = Type::all();
        $specialites  = Specialite::all();
        $villes = Ville::all();

        return view('etablissementCreate', compact('territoires','types','specialites','villes'));
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
        $territoires= Territoire::all();
        $types = Type::all();
        $specialites  = Specialite::all();
        $villes = Ville::all();

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


        return redirect('/etablissement')->with("successAjout", "l'etablissement' '$request->ETABNom'a ??t?? ajout?? avec succ??s");
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
        $territoires= Territoire::all();
        $types = Type::all();
        $specialites  = Specialite::all();
        $villes = Ville::all();

        $etablissement = Etablissement::findOrFail($id);
        return view('etablissementUpdate', compact("etablissement",'territoires','types','specialites','villes'));

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

        return redirect('/etablissement')->with("successModify", "L'etablissement' '$request->ETABNom' a ??t?? mise ?? jour avec succ??s");
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

        return back()->with("successDelete", "L'etablissement' '$nometab' a ??t?? supprim?? avec succ??ss");
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

    public function affiche($id2){

        $territoires= Territoire::all();
        $types = Type::all();
        $specialites  = Specialite::all();
        $villes = Ville::all();

        $etablissement = Etablissement::find($id2);

        return view("etablissementAffichage", compact("etablissement",'territoires','types','specialites','villes'));
    }

    public function  show2(Request $request){
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

        return view("etablissement4", ["etablissements" => $etablissements]);
    }

    public function filtre(){
        $q = request()->input('q');
        $p = request()->input('p');
        $etablissements = Etablissement::Where('TERRCode','LIKE',"%$q%")
            ->Where('TYPCode','LIKE',"%$p%")
            ->get();

        return view('etablissementFiltre')->with('etablissement', $etablissements);
    }

    public function telechargerPdf($id3){

        $territoires= Territoire::all();
        $types = Type::all();
        $specialites  = Specialite::all();
        $villes = Ville::all();

        $etablissement = Etablissement::findOrFail($id3);

        $pdf = FacadePdf::loadView('telechargement1',compact('etablissement','territoires','types','specialites','villes'));
        return $pdf->download('telechargement1.pdf');
    }

    //Wassim Meyyah
}
