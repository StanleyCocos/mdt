<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Services\Web\EventService;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function index(Request $request, EventService $service){
        $imei = $request->route('imei', '');
        $list = $service->index($imei);
        return view('event_index', ['data'=> $list, 'imei'=>$imei]);
    }

    public function clear(Request $request, EventService $service){
        $imei = $request->route('imei', '');
        $service->clear($imei);
        return redirect()->route('event.index', ['imei'=>$imei]);
    }

    public function error(Request $request, EventService $service){
        $imei = $request->route('imei', '');
        $list = $service->error($imei);
        return view('event_error', ['data'=> $list, 'imei'=>$imei]);
    }

}
