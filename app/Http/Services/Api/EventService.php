<?php

namespace App\Http\Services\Api;

use App\Models\Event;

class EventService {

    public function store($data){
        $event = new Event();
        $event->name = $data['name'] ?? '';
        $event->client = $data['client'] ?? '';
        $event->imei = $data['imei'] ?? '';
        $event->version = $data['version'] ?? '';
        $event->state = $this->nameRule($event->name);
        $event->save();
        return $event;
    }


    protected function nameRule($name){
        if(preg_match("/[ '.,:;*?~`!@#$%^&+=)(<>{}]|\]|\[|\/|\\\|\"|\|/",$name)){
            return false;
        }
        return true;
    }
}
