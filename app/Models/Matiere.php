<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $guarded = [];

    protected $table = 'matiere';

    public $timestamps = false;

    protected $primaryKey = 'idmatiere';

    protected $fillable = ['lintitule'];


    public function groupeMatiere()
    {

        return $this->belongsToMany(Groupe::class);
    }

    public function profMatiere()
    {
        return $this->belongsTo(Professeur::class);
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }






}
