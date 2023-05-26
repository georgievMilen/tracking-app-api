<?php

namespace App\Services;

use App\Models\Account;

class AccountService
{
    public function __construct(private Account $account)
    {
    }

    public function balanceNotEnough(int $amount): bool
    {
        return $this->account->balance < $amount;
    }

    public function reduceAccountBalance(int $amount): void
    {
        $this->account->update([
            'balance' => $this->account->balance - $amount,
        ]);
    }

    public function increaseAccountBalance(int $amount): void
    {
        $this->account->update([
            'balance' => $this->account->balance + $amount,
        ]);
    }
}
