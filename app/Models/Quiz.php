<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        "title",
        "description",
        "finished_at",
        "status",
        "slug"
    ];
    protected $dates = ["finished_at"];
    protected $appends = ["details", "my_rank"];


    public function getMyRankAttribute()
    {
        if ($this->my_result) {
            $rank = 0;
            foreach ($this->results()->orderByDesc("point")->get() as $result) {
                $rank += 1;
                if ($result->user_id === auth()->user()->id) {
                    return $rank;
                }
            }
        }
        return null;
    }


    public function getDetailsAttribute()
    {
        if ($this->results()->count() > 0) {
            return [
                "average" => round($this->results()->avg("point")),
                "join_count" => count($this->results()->get())
            ];
        }
        return null;
    }

    public function my_result()
    {
        return $this->hasOne("App\Models\Result")->where("user_id", auth()->user()->id);
    }

    public function results()
    {
        return $this->hasMany("App\Models\Result");
    }

    public function topTen()
    {
        return $this->results()->orderByDesc("point")->take(10);
    }


    public function getFinishedAttribute($date)
    {
        return $date ? Carbon::parse($date) : null;
    }

    public function questions()
    {
        return $this->hasMany("App\Models\Question");
        // ->with("answers");
    }

    // public function getCorrectAnswerAttribute(){
    //       $questions= $this->hasMany("App\Models\Question")->with("answers")->get();
    //     $x=array();
    //     foreach ($questions as $question) {
    //         $x[]= $question->answers->where("answer",$question->correct_answer)->count();
    //      }
    //      return  $x;
    // }

    public function sluggable(): array
    {
        return [
            "slug" => [
                'source' => 'title'
            ]
        ];
    }

    // public function scopeFilter($query, array $filters){
    //     if($filters["status"]?? false){
    //         $query->where("status","like", "%".request("status")."%");
    //     }
    // }

}
