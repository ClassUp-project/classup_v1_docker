<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{

    protected $table = 'groupe';

    protected $primaryKey = 'idgroupe';

    protected $guarded = [];

    public $timestamps = false;

    protected $fillable = ['nom', 'acronyme','professeur_idprofesseur','utilisateur_idutilisateur'];


    public function professeur()
    {

        return $this->belongsToMany(Professeur::class);
    }


    public function matiere()
    {

        return $this->belongsToMany(Matiere::class);
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }

    public function questionnaire()
    {
        return $this->hasMany(Questionnaire::class);
    }



}
