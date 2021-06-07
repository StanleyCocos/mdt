<?php

namespace App\Http\Transformers\Api;

use App\Models\History;

class HistoryTransformers {

    public function transform(History $item)
    {
        return [
            'id'         => $item->id,
            'client'     => $item->client,
            'imei'       => $item->imei,
            'version'    => $item->version,
            'time'       => $item->created_at,
            'url'       => $item->url,
            'header'     => $item->header,
            'params'     => $item->params,
            'result'    => $item->result,
            'code'      => $item->code,
            'method'    => $item->method,
        ];
    }
}
