<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotaryResource extends JsonResource {

    public function toArray($request) {
        return [
            'name'  => $this->name,
            'last_name'  => $this->last_name,
            'email'  => $this->email,
            'receipt_date'  => $this->receipt_date->format('d.m.Y'),
            'record_type'   => $this->record_type
        ];
    }
}
