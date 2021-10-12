<?php
namespace App\Http\Transformers\Api;

use App\Models\AppleNews;
use League\Fractal\TransformerAbstract;

class AppleNewsTransformers extends TransformerAbstract
{
    public function transform(AppleNews $item)
    {
        return [
            'id'         => $item->id,
            'title'       => $item->title,
            'time'       => $item->created_at,
        ];
    }
}