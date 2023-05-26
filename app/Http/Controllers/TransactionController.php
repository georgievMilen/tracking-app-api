<?php

namespace App\Http\Controllers;

use App\Enums\CategoryTypeEnum;
use App\Http\Resources\AccountResource;
use App\Http\Resources\TransactionResource;
use App\Http\Responses\APIResponse;
use App\Models\Account;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Transaction;
use App\Services\AccountService;
use App\Services\TransactionService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TransactionController extends Controller
{
    public function list(Request $request): AnonymousResourceCollection
    {
        $transactions = Transaction::query();
        if($request->filled('type')) {
            $transactions->where('type', $request->input('type'));
        }

        return TransactionResource::collection(Transaction::get())->additional(['message' => 'Transaction resource']);
    }

    public function get(string $uuid): TransactionResource
    {
        return (new TransactionResource(Transaction::getByUUID($uuid)))->additional(['message' => 'Transaction resource']);
    }

    public function create(Request $request): JsonResponse
    {
        $account = Account::getByUUID($request->input('account_uuid'));

        $accountService = new AccountService($account);

        if (TransactionService::isExpenseType($this->request->input('type'))) {
            if ($accountService->balanceNotEnough($this->request->input('amount'))) {
                APIResponse::fail('Account balance is less than the required amount', 400);
            }

            $accountService->reduceAccountBalance($this->request->input('amount'));
        } else {
            $accountService->increaseAccountBalance($this->request->input('amount'));
        }

        Transaction::create([
            'type'        => $request->input('type'),
            'account_id'  => $account->id,
            'category_id' => Category::getByUUID($request->input('category_uuid'))->id,
            'amount'      => $request->input('amount'),
            'comment'     => $request->input('comment'),
            'currency_id' => Currency::getCurrencyByCode($request->input('currency_code'))->id,
            'executed_on' => Carbon::parse($request->input('executed_on')),
        ]);

        return APIResponse::success('Transaction successfully created')->json();
    }

    public function update(Request $request, string $uuid): JsonResponse
    {
        $transaction = Transaction::getByUUID($uuid);

        $account = Account::getByUUID($request->input('account_uuid'));

        $accountService = new AccountService($account);

        if (TransactionService::isExpenseType($transaction->type)) {
            $accountService->increaseAccountBalance($transaction->amount);
        } else {
            $accountService->reduceAccountBalance($transaction->amount);
        }

        if (TransactionService::isExpenseType($this->request->input('type'))) {
            if ($accountService->balanceNotEnough($this->request->input('amount'))) {
                APIResponse::fail('Account balance is less than the required amount', 400);
            }

            $accountService->reduceAccountBalance($this->request->input('amount'));
        } else {
            $accountService->increaseAccountBalance($this->request->input('amount'));
        }

        $transaction->update([
            'type'        => $request->input('type'),
            'account_id'  => $account->id,
            'category_id' => Category::getByUUID($request->input('category_uuid'))->id,
            'amount'      => $request->input('amount'),
            'comment'     => $request->input('comment'),
            'currency_id' => Currency::getCurrencyByCode($request->input('currency_code'))->id,
            'executed_on' => Carbon::parse($request->input('executed_on')),
        ]);

        return APIResponse::success('Transaction successfully updated')->json();
    }

    public function delete(string $uuid): JsonResponse
    {
        Transaction::getByUUID($uuid)->delete();

        return APIResponse::success('Transaction successfully deleted')->json();
    }
}
