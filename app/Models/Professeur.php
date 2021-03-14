<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Professeur extends model
{



    protected $fillable = [
        'professeur',
    ];

    protected $guarded = [];

    protected $table = 'professeur';

    public $timestamps = false;

    protected $primaryKey = 'idprofesseur';




    public function utilisateur()
    {

        return $this->belongsToMany(Utilisateur::class, 'professeur_utilisateur' );
    }

   


    public function groupe()
    {
        return $this->belongsToMany(Groupe::class);
    }


    public function matiereProf()
    {
        return $this->hasMany(Matiere::class);
    }

    public function questionnaire()
    {
        return $this->hasMany(Questionnaire::class);
    }










}
