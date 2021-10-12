<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Api\AppleNewsService;
use App\Http\Transformers\Api\AppleNewsTransformers;

class AppleNewsController extends Controller
{
    //

    public function store(Request $request, AppleNewsService $service, AppleNewsTransformers $transformers){

        $appleNews = $service->store($request->all());
        return $transformers->transform($appleNews);

    }

}
