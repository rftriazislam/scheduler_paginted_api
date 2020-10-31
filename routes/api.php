<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/Question-Create','QuestionController@InsertQuestion'); 
Route::post('/Question-Answers-Create','QuestionController@InsertQuestionAnswers'); 

Route::get('/All-Question','QuestionController@GetQuestion'); 
Route::get('/All-Question-48-hours','QuestionController@GetQuestion48houre'); 

