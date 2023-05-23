<?php

namespace App\Services\OperationService;

use App\Http\Resources\ResultResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

interface OperationServiceInterface
{
    /**
     * Plus Operation calculate float $a+ float $b and return result as ResultResource
     *
     * @param float $firstNumber
     * @param float $secondNumber
     * @return JsonResource
     */
    public function plusOperation(float $firstNumber, float $secondNumber): JsonResource;

    /**
     * Minus Operation calculate $a-$b and return $float
     */
    public function minusOperation(float $firstNumber, float $secondNumber): JsonResource;

    /**
     * multiplication Operation calculate $a*$b and return $float
     */
    public function multiplicationOperation(float $firstNumber, float $secondNumber): JsonResource;

    /**
     * multiplication Operation calculate $a/$b and return $float
     */
    public function divisionOperation(float $firstNumber, float $secondNumber): JsonResource;
}
