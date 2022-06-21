<?php

namespace App\Repositories;

use App\Http\Resources\LaptopResource;
use App\Models\Laptop;
use Illuminate\Http\JsonResponse;

class LaptopRepository
{
    public function getLaptops()
    {
        try {
            return response()->json([
                'laptops' => LaptopResource::collection(Laptop::all()),
            ]);
        } catch (\Exception $exception) {
            return  $exception;
        }
    }
}
