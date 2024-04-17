<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\Multiply;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Multiply\MultiplyRequest;
use App\Utils\Multiply\MultiplyHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class MultiplyController extends Controller
{
    public function __invoke(MultiplyRequest $request): JsonResponse
    {
        $validated = $request->safe()->only(['size']);
        $size = (int)$validated['size'];

        if (Cache::has("multiply_table_$size")) {
            return response()->json(Cache::get("multiply_table_$size"));
        }

        $multiplicationTable = MultiplyHelper::generateMultiplicationTable($size);
        Cache::put("multiply_table_$size", $multiplicationTable);

        return response()->json($multiplicationTable);
    }
}
