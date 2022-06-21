<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\LaptopLoanRequest;
use App\Models\Request;
use App\Repositories\AuthRepository;
use App\Repositories\RequestRepository;
use Illuminate\Http\JsonResponse;

class RequestController extends Controller
{

    /**
     * @var RequestRepository
     */
    private $requestRepository;
    /**
     * Create a new AuthController instance.
     *
     * @param RequestRepository $requestRepository
     */
    public function __construct(RequestRepository $requestRepository)
    {
        $this->requestRepository = $requestRepository;
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return JsonResponse
     */
    public function requestLaptop(LaptopLoanRequest $laptopLoanRequest): JsonResponse
    {
        return $this->requestRepository->requestLaptop($laptopLoanRequest);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @param $requestId
     * @return JsonResponse
     */
    public function cancelRequest( $requestId): JsonResponse
    {
        return $this->requestRepository->cancelRequest($requestId);
    }
}
