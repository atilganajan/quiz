<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        "quiz_id",
        "question",
        "image",
        "answer1",
        "answer2",
        "answer3",
        "answer4",
        "correct_answer"
    ];

    protected $appends = ["true_perencent"];


    public function getTruePerencentAttribute(){
        // doğru cevap yüzdelik hesaplama 
        $answer_count=$this->answers()->count();
        $true_answer=$this->answers()->where("answer",$this->correct_answer)->count();
        return round((100 /$answer_count * $true_answer));
        
    }

    public function answers(){
        return $this->hasMany("App\Models\Answer");
    }

    public function my_answer(){
        return $this->hasOne("App\Models\Answer")->where("user_id",auth()->user()->id);
    }

    // public function answers(){
    //     return $this->hasMany("App\Models\Answer");
    // }
}
