<?php 

namespace App\Http\Services\Api;

use App\Models\AppleNews;

class AppleNewsService{

    public function store($data){
        $news = new AppleNews();
        $news->title = $data['title'] ?? '';
        $news->time = $data['time'] ?? '';
        $news->save();
        return $news;
    }


    public function exist($data){
    	$title =  $data['title'] ?? '';
    	$time =  $data['time'] ?? '';
    	return AppleNews::where('time',$time)->exists();
    }
}