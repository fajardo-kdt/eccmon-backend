<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CylinderUpdateResource extends JsonResource
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
            'process' => $this->process,
            'location' => $this->location,
            'cycle' => $this->cycle,
            // 'otherDetails' => $this->other_details,
            'otherDetails' => json_decode($this->other_details, true),
            'dateDone' => $this->date_done,
        ];
    }
}
