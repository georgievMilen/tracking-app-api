<?php

namespace App\Http\Resources;

use App\Models\Account;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

/**
 * @mixin Account
 */
class AccountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'uuid'             => $this->uuid,
            'name'             => $this->name,
            'balance'          => $this->balance,
            'color'            => $this->color,
            'currency'         => new CurrencyResource($this->currency),
            'active'           => $this->active,
            'in_total_balance' => $this->in_total_balance,
        ];
    }
}
