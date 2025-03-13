<?php

namespace App\Http\Resources;

use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'bank_name' => $this->bank->bank_name,
            'bank_county' => $this->bank->country_iso,
            'original_payout_info' => [
                'iban' => str_replace(' ', '-', $this->bank->iban),
                'bic' => $this->bank->bic,
            ],
            'payout_info' => [
                'iban' => str_replace(' ', '', $this->bank->iban),
                'bic' => str_replace(' ', '', $this->bank->bic),
            ],
            
        ];
    }
}
