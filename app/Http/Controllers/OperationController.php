<?php

namespace App\Http\Controllers;

use App\Http\Requests\DivisionRequest;
use App\Http\Requests\GeneralRequest;
use App\Services\OperationService\OperationServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OperationController extends Controller
{
    public function __construct(protected OperationServiceInterface $operationService)
    {
    }

    /**
     * Plus Operation
     * @param GeneralRequest $request
     * @return JsonResource
     */
    public function plusOperation(GeneralRequest $request): JsonResource
    {
        return $this->operationService->plusOperation($request->firstNumber, $request->secondNumber);
    }

    /**
     * Minus Operation
     * @param GeneralRequest $request
     * @return JsonResource
     */
    public function minusOperation(GeneralRequest $request): JsonResource
    {
        return $this->operationService->minusOperation($request->firstNumber, $request->secondNumber);
    }

    /** Multiplication Operation
     * @param GeneralRequest $request
     * @return JsonResource
     */
    public function multiplicationOperation(GeneralRequest $request): JsonResource
    {
        return $this->operationService->multiplicationOperation($request->firstNumber, $request->secondNumber);
    }

    /**
     * Division Operation
     * @param DivisionRequest $request
     * @return JsonResource
     */
    public function divisionOperation(DivisionRequest $request): JsonResource
    {
        return $this->operationService->divisionOperation($request->firstNumber, $request->secondNumber);
    }


}
