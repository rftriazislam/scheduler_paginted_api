<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table='questions';
    protected $fillable =['question_type','question_name','questioon','question_description','question_date'];
    public function question_answer(){
        return $this->hasMany('App\QuestionAnswer','question_id','id');
    }
}
