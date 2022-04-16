<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductAttributesResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'title' => $this->title,
            'value' => $this->pivot->value,
        ];
    }
}
