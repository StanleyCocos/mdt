<?php
namespace App\Http\Transformers\Api;

use App\Models\Event;
use League\Fractal\TransformerAbstract;

class EventTransformers extends TransformerAbstract
{
    public function transform(Event $item)
    {
        return [
            'id'         => $item->id,
            'client'     => $item->client,
            'name'       => $item->name,
            'imei'       => $item->imei,
            'version'    => $item->version,
            'state'      => $item->state,
            'time'       => $item->created_at,
        ];
    }
}
