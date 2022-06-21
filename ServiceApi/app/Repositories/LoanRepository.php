<?php

namespace App\Repositories;

use App\Http\Resources\LoanResource;
use App\Http\Resources\RequestResource;
use App\Models\Loan;
use App\Models\Request;
use App\Responses\Responses;
use Carbon\Carbon;

class LoanRepository
{
    public function checkinLaptop($requestId, $userId, $laptopId)
    {
        try {
            $nowTimeDate = Carbon::now();

            Loan::create([
                'loan_date' => $nowTimeDate,
                'laptop_id' => $laptopId,
                'added_by' => auth()->user()->id,
                'user_id' => $userId,
                'request_id' => $requestId
            ]);

            $request = Request::where('id', $requestId)->first();
            $request->update([
                'status' => Responses::active
            ]);


            return response()->json([
                'loans' => LoanResource::collection(Loan::all()),
                'pendingRequests' => RequestResource::collection(Request::all()),
            ]);
        } catch (\Exception $exception) {
            return  $exception;
        }
    }
}
