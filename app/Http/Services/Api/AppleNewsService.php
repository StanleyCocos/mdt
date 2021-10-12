<?php 

namespace App\Http\Services\Api;

use App\Models\AppleNews;

class AppleNewsService{

    public function store($data){
        $history = new AppleNews();
        $history->title = $data['title'] ?? '';
        $history->time = $data['time'] ?? '';
        $history->save();
        return $history;
    }
}