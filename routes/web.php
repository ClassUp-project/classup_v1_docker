<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//Route vers le choix et vue de la classe côté professeur
Route::get('/maclasses/create', 'GroupeController@create');
Route::post('/maclasses', 'GroupeController@store');
Route::get('/maclasses/{idutilisateur}', 'GroupeController@show')->name('classe');

//Route vers le choix et vue de la classe côté élève
Route::get('/eleves/create', 'EleveController@create');
Route::post('/eleves', 'EleveController@store');
Route::get('/eleves/{idutilisateur}', 'EleveController@show')->name('classe-eleve');

//Route vers les questionnaires, questions, réponses, enquetes
//Questionnaire
Route::get('/questionnaires/create', 'QuestionnaireController@create');
Route::post('/questionnaires','QuestionnaireController@store');
Route::get('/questionnaires/{questionnaire}','QuestionnaireController@show');

//Questions
Route::get('/questionnaires/{questionnaire}/questions/create', 'QuestionController@create');
Route::post('/questionnaires/{questionnaire}/questions', 'QuestionController@store');

//Enquete
Route::delete('/questionnaires/{questionnaire}/questions/{question}', 'QuestionController@destroy');
Route::get('/surveys/{questionnaire}-{slug}','EnqueteController@show');
Route::post('/surveys/{questionnaire}-{slug}', 'EnqueteController@store');

Route::get('/surveys/merci', 'EnqueteController@merci');


//Route vers les choix et vue des matières
Route::get('/matieres/create', 'MatiereController@create');
Route::post('/matieres', 'MatiereController@store');
Route::get('/matières/{matiere}', 'MatiereController@show');


//Route dasboard eleve
Route::get('/eleves/', 'EleveController@index')->name('dashboardEleve');
