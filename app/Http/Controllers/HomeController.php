<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Topic;
use App\Models\SubTopic;

class HomeController extends Controller
{
    public function showHome(){
        return view('index',[
            'languages' => Language::get()
        ]);
    }
    public function showTopic($lid = 1,$tid = 0 ){
        $languages = Language::get();
        $topics = Topic::where('language_id',$lid)->get();
        if($tid == 0){
            $tid = $topics[0]->id;
        }
        $subTopics = SubTopic::where('topic_id',$tid)->get();
        return view('language',[
            'languages' => $languages,
            'lid'=>$lid,
            "topics"=> $topics,
            'tid'=>$tid,
            'subTopics' => $subTopics
        ]);
    }
}
