<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Transformers\Api\EventTransformers;
use Illuminate\Http\Request;
use App\Http\Services\Api\EventService;

class EventController extends Controller
{
    public function store(Request $request, EventService $service, EventTransformers $transformers){
        $event = $service->store($request->all());
        return $transformers->transform($event);
    }
}
