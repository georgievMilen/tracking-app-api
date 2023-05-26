<?php

namespace App\Http\Controllers;

use App\Http\Responses\APIResponse;
use App\Services\DashboardDataService;
use Illuminate\Http\JsonResponse;

class DashboardController extends Controller
{
    public function getData(): JsonResponse
    {
        return APIResponse::success('Dashboard Data', 200, DashboardDataService::getData())->json();
    }
}
