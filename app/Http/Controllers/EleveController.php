<?php

namespace App\Http\Controllers;
use App\Eleve;
use App\Groupe;
use App\Matiere;
use App\Professeur;
use App\Utilisateur;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;



class EleveController extends Controller
{
    public function __construct()
      {
         $this->middleware('auth');
      }


      public function create(){


        return view('choix-classe-eleve.create');

    }



    public function store(){


        $professeur = Eleve::where('eleve','ideleve')->get();


        $data = request()->validate([

            'nom'=>'required',
            'acronyme'=>'required',
        ]);
        $groupeClasse = Auth::user()->groupe()->create($data);

        $data = request()->validate([

            'lintitule'=>'required',
        ]);
        $matiere = Auth::user()->matiere()->create($data);



        return redirect('/eleves/'.$groupeClasse->idgroupe)->with(compact('matiere'));


    }



    public function show($idutilisateur){



        $groupe = auth()->user()->groupe;

        $matiere = auth()->user()->matiere;



        return view('choix-classe-eleve.show', compact('groupe','matiere'));
    }











}
