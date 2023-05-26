<?php

namespace App\Http\Controllers;

use App\Http\Resources\AccountResource;
use App\Http\Responses\APIResponse;
use App\Models\Account;
use App\Models\Currency;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AccountController extends Controller
{
    public function list(): AnonymousResourceCollection
    {
        return AccountResource::collection(Account::active()->get())->additional(['message' => 'Account resource']);
    }

    public function get(string $uuid): AccountResource
    {
        return (new AccountResource(Account::getByUUID($uuid)))->additional(['message' => 'Account resource']);
    }

    public function create(Request $request): JsonResponse
    {
        Account::create([
            'name'             => $request->input('name'),
            'balance'          => $request->input('balance'),
            'color'            => $request->input('color'),
            'currency_id'      => Currency::getCurrencyByCode($request->input('currency_code'))->id,
            'in_total_balance' => $request->input('in_total_balance'),
        ]);

        return APIResponse::success('Account successfully created')->json();
    }

    public function update(Request $request, string $uuid): JsonResponse
    {
        $account = Account::getByUUID($uuid);

        $account->update([
            'name'             => $request->input('name'),
            'balance'          => $request->input('balance'),
            'color'            => $request->input('color'),
            'currency_id'      => Currency::getCurrencyByCode($request->input('currency_code'))->id,
            'in_total_balance' => $request->input('in_total_balance'),
        ]);

        return APIResponse::success('Account successfully updated')->json();
    }

    public function delete(string $uuid): JsonResponse
    {
        Account::getByUUID($uuid)->delete();

        return APIResponse::success('Account successfully deleted')->json();
    }
}
