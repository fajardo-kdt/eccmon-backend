<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CylinderCoverResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'serialNumber' => $this->serial_number,
            'isDisposed' => $this->is_disposed,
            'disposalDate' => $this->disposal_date,
            'status' => $this->status,
            'location' => $this->location,
            'case' => $this->case,
            'cycle' => $this->cycle,
            'createdAt' => $this->updated_at,
            'updates' => new CylinderUpdateResource($this->whenLoaded('updates'))
        ];
    }
}
