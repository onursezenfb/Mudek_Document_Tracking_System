<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubmitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this -> id,
            'term' => $this -> term,
            'crn' => $this -> crn,
            'type' => $this -> type,
            'submitted' => $this -> submitted,
            'pdf_data' => $this -> pdf_data
        ];
    }
}
