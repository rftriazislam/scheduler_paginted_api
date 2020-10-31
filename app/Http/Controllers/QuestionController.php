<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Question;
use App\QuestionAnswer;

use Carbon\Carbon;
class QuestionController extends Controller
{
    public function InsertQuestion(Request $request){

        $validator = Validator::make( $request->all(), [
            'question'=>'required',
            'question_type'=>'required',
            'question_name'=>'required',
           


        ] );
        if ( $validator->fails() ) {
            return response()->json( [$validator->errors()], 400 );
        }
            $question_save=new Question();
            $question_save->question_type=$request->question_type;
            $question_save->question_name=$request->question_name;
            $question_save->question=$request->question;
            $question_save->question_description=$request->question_description;
            $question_save->question_date=Carbon::now();

            if ( $question_save->save() ) {
                return response()->json( ['success'=>true, 'message'=>'Question information Sucessfully Added'], 200 );
            } else {
                return response()->json( ['success'=>false, 'message'=>' Question information Unsucessfully Added'], 400 );
            }
        
       
    }
    public function GetQuestion(){
        $all_question=Question::all();
        $count=$all_question->count();
        return response()->json( ['success'=>true, 'get all question'=>$count], 200 );
    }
    public function  InsertQuestionAnswers(Request $request){
        $validator = Validator::make( $request->all(), [
            'question_id'=>'required|exists:questions,id',
            'question_answer'=>'required',
        ] );

        if ( $validator->fails() ) {
            return response()->json( [$validator->errors()], 400 );
        }
            $question_answer_save=new QuestionAnswer();
            $question_answer_save->question_id=$request->question_id;
            $question_answer_save->question_answer=$request->question_answer;


            if ( $question_answer_save->save() ) {
                return response()->json( ['success'=>true, 'message'=>'Question Answer information Sucessfully Added'], 200 );
            } else {
                return response()->json( ['success'=>false, 'message'=>' Question Answer information Unsucessfully Added'], 400 );
            }
    }
public function GetQuestion48houre(){

    // $all_question=Question::with('question_answer')->where('id',6)->get();

        $all_question=Question::all()->first();
         $start_time=$all_question->created_at;
         $end_time =Carbon::now();
         $set_time =date("Y-m-d")." 08:00:00";
         
        if($set_time==$end_time){
            $time =$start_time->diff($end_time)->format('%H:%I:%S');

            if($end_time=='48:00:00'){

                return response()->json( ['success'=>true, 'get all question 48 hours'=>$end_time], 200 );
    
            }
        }


             
        return response()->json( ['success'=>true, 'get all question 48 hours'=>$end_time], 200 );


}

}
