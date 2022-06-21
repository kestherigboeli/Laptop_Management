<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use App\Repositories\LaptopRepository;
use Illuminate\Http\Request;

class LaptopController extends Controller
{
    /**
     * @var LaptopRepository
     */
    private $laptopRepository;

    /**
     * @param LaptopRepository $laptopRepository
     */
    public function __construct(LaptopRepository $laptopRepository)
    {
        $this->laptopRepository = $laptopRepository;
    }

    public function getLaptops() {

        return $this->laptopRepository->getLaptops();
    }

}
