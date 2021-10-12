<?php

namespace App\Http\Services\Api;

use App\Models\History;

class ApiHistoryService{

    public function store($data){
        $history = new History();

        $history->header = $data['hedaer'] ?? '';
        $history->params = $data['params'] ?? '';
        $history->url = $data['url'] ?? '';
        $history->imei = $data['imei'] ?? '';
        $history->result = $data['result'] ?? '';
        $history->client = $data['client'] ?? '';
        $history->version = $data['version'] ?? '';
        $history->code = $data['code'] ?? '';
        $history->method = $data['method'] ?? '';
        $history->save();
        return $history;
    }

}
