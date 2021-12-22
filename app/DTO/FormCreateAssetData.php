<?php

namespace App\DTO;

use App\Http\Requests\CreateAssetRequest;
use Spatie\DataTransferObject\DataTransferObject;

class FormCreateAssetData extends DataTransferObject
{
    public string $date;

    public static function fromRequest(CreateAssetRequest $request): self
    {
        $data = $request->validated();

        return new self([
            'date' => $data['date'],
        ]);
    }
}
