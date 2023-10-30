<?php

namespace App\Http\Controllers;

use App\Http\Resources\AccountResource;
use App\Http\Resources\CategoryResource;
use App\Http\Responses\APIResponse;
use App\Models\Account;
use App\Models\Category;
use App\Models\Currency;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function list(Request $request): AnonymousResourceCollection
    {
        $query = Category::query();
        if($request->filled('type')) {
            $query->type($request->input('type'));
        }

        return CategoryResource::collection($query->get())->additional(['message' => 'Category resource']);
    }

    public function get(string $uuid): CategoryResource
    {
        return (new CategoryResource(Category::getByUUID($uuid)))->additional(['message' => 'Category resource']);
    }

    public function create(Request $request): JsonResponse
    {
        Category::create([
            'name'  => $request->input('name'),
            'type'  => $request->input('type'),
            'color' => $request->input('color'),
        ]);

        return APIResponse::success('Category successfully created')->json();
    }

    public function update(Request $request, string $uuid): JsonResponse
    {
        $category = Category::getByUUID($uuid);

        $category->update([
            'name'  => $request->input('name'),
            'type'  => $request->input('type'),
            'color' => $request->input('color'),
        ]);

        return APIResponse::success('Category successfully updated')->json();
    }

    public function delete(string $uuid): JsonResponse
    {
        $category = Category::getByUUID($uuid);

        $category->delete();

        return APIResponse::success('Category successfully deleted')->json();
    }
}
