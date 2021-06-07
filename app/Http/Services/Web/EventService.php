<?php
namespace App\Http\Services\Web;

use App\Models\Event;
use Illuminate\Support\Facades\DB;

class EventService {

    public function index($imei){
        if(strlen($imei) > 0){
            $event = Event::where('imei', $imei)->orderBy('created_at','desc')->paginate(20);
        } else {
            $event = Event::orderBy('created_at','desc')->paginate(20);
        }
        return $event;
    }

    public function clear($imei){
        if(strlen($imei) > 0){
            Event::where('imei', $imei)->delete();
        } else {
            DB::statement('SET FOREIGN_KEY_CHECKS = 0');
            DB::table('event')->truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }
    }

    public function error($imei){
        if(strlen($imei) > 0){
            $event = Event::where('imei', $imei)->where('state', false)->orderBy('created_at','desc')->paginate(20);
        } else {
            $event = Event::where('state', false)->orderBy('created_at','desc')->paginate(20);
        }
        return $event;
    }
}
