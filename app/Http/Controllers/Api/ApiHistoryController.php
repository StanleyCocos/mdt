<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\Api\ApiHistoryService;
use App\Http\Transformers\Api\HistoryTransformers;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Array_;

class ApiHistoryController extends Controller
{
    //
    public function store(Request $request, ApiHistoryService $service, HistoryTransformers $transformers){
        $history = $service->store($request->all());
        return $transformers->transform($history);
    }


    public  function test(Request $request){
        foreach ((array) $request->source_id as $source_id) {
            echo $source_id;
        }
        dd($request->all());
    }
}
