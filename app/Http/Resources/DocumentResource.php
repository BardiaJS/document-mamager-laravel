<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DocumentResource extends JsonResource
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
            'title' => $this->title,
            'body' => $this->body,
            'creator' => $this->creator,
            'create_date'=> $this->create_date,
            'is_document_admin_signed' => $this->is_document_admin_signed,
            'is_document_manager_signed' => $this->is_document_manager_signed,
            'is_boss_signed' => $this->is_boss_signed, 
        ];
    }
}
