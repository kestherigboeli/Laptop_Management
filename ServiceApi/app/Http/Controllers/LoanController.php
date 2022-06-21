<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Repositories\LoanRepository;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * @var LoanRepository
     */
    private $loanRepository;

    /**
     * @param LoanRepository $loanRepository
     */
    public function __construct(LoanRepository $loanRepository)
    {

        $this->loanRepository = $loanRepository;
    }

    public function checkinLaptop($requestId, $userId, $laptopId) {

        return $this->loanRepository->checkinLaptop($requestId, $userId, $laptopId);
    }
}
