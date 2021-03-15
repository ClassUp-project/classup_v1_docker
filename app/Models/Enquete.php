<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquete extends Model
{
   protected $guarded=[];

   protected $primaryKey = 'idenquete';

   protected $table = 'enquete';

   public $timestamps = false;



   public function  questionnaire()
   {

          return $this->belongsTo(App\models\Questionnaire::class);
   }

   public function responses()
   {

           return $this->hasMany(App\models\ReponseEnquete::class);
   }
}
