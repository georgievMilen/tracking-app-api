<?php

namespace App\Http\Resources;

use App\Models\Transaction;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

/**
 * @mixin Transaction
 */
class TransactionResource extends JsonResource
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
            'type'             => $this->type,
            'account'          => new AccountResource($this->account),
            'category'         => new CategoryResource($this->category),
            'amount'           => $this->amount,
            'comment'          => $this->comment,
            'currency'         => new CurrencyResource($this->currency),
            'executed_on'      => $this->executed_on,
        ];
    }
}
