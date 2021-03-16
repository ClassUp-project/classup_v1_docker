<?php

namespace App\Http\Controllers;

use App\AccueilEleve;
use App\Profile;
use App\User;
use App\Models\Questionnaire;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Questionnaire $questionnaires)
    {

        $questionnaires = auth()->user()->questionnaires;

        

        return view('home', compact('questionnaires'));
    }


    public function user(User $user)
    {

       $user=auth()->user()->profile;
       return view('home', compact('user'));

    }
}