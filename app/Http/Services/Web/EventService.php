<?php
namespace App\Http\Services\Web;

use App\Models\Event;

class EventService {

    public function index($imei){
        $event = Event::where('imei', $imei)->orderBy('created_at','desc')->paginate(20);
        return $event;
    }

    public function clear($imei){
        $number = Event::where('imei', $imei)->delete();
        return $number;
    }

    public function error($imei){
        $event = Event::where('imei', $imei)->where('state', false)->orderBy('created_at','desc')->paginate(20);
        return $event;
    }
}
