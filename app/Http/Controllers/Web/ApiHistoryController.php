<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Services\Web\ApiHistoryService;
use App\Http\Transformers\Api\HistoryTransformers;
use App\Models\History;
use Illuminate\Http\Request;

class ApiHistoryController extends Controller
{

    public function index(Request $request, ApiHistoryService $service){
        $imei = $request->route('imei', '');
        $list = $service->index($imei);
        return view('api_list', ['data' => $list]);
    }

    public function detail($id, HistoryTransformers $transformers){
        $history = History::find($id);
        return view('api_detail', ['detail' => $history]);
    }
}
