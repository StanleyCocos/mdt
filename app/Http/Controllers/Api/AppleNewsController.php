<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Api\AppleNewsService;
use App\Http\Transformers\Api\AppleNewsTransformers;
use GuzzleHttp;

class AppleNewsController extends Controller
{
    public function store(Request $request, AppleNewsService $service, AppleNewsTransformers $transformers){
        
        if(!$service->exist($request->all())){
            $appleNews = $service->store($request->all());
            $http = new GuzzleHttp\Client;
            $response = $http->request('GET', 'http://eagle.addcn.com/jalert/sendnotify.cgi?receiver=10456,10400&title=apple新规&msg='.$appleNews->title);
            return $response->getStatusCode();
            return $transformers->transform($appleNews);
        }        
        return ["code"=>200, "msg"=> "重复"];
    }
}
