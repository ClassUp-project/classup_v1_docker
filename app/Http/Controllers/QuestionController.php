<?php

namespace App\Http\Controllers;

use App\Reponse;
use App\Question;
use App\Questionnaire;


class QuestionController extends Controller
{

     public function create(Questionnaire $questionnaire)
     {
          return view('question.create', compact('questionnaire'));

     }


     public function store(Questionnaire $questionnaire)
     {

         $data =request()->validate([
             'question.question'=>'required',
             'reponse.*.reponse'=>'required',
         ]);

        $question =$questionnaire->questions()->create($data['question']);
        $question->answers()->createMany($data['reponse']);

        return redirect('/questionnaires/'.$questionnaire->idquestionnaire);

     }

      public function destroy(Questionnaire $questionnaire ,Question $question)
      {

             $question->answers()->delete();

             $question->delete();

             return redirect($questionnaire->path());

      }

}
