<?php
namespace App\Http\Services\Web;


use App\Models\History;

class ApiHistoryService {

    public function index($imei){
        if(strlen($imei) > 0){
            $list = History::where('imei', $imei)->orderBy('created_at','desc')->paginate(20);
        } else {
            $list = History::orderBy('created_at','desc')->paginate(20);
        }
        return $list;
    }

}
