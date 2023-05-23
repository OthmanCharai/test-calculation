<?php

namespace App\Services\OperationService;

use App\Http\Resources\ExceptionResource;
use App\Http\Resources\ResultResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OperationService implements OperationServiceInterface
{
    /**
     * Plus operation implementation
     */
    public function plusOperation(float $firstNumber, float $secondNumber): JsonResource
    {
        
        return $this->performOperation('+', $firstNumber, $secondNumber);
    }

    /**
     * Minus operation implementation
     */
    public function minusOperation(float $firstNumber, float $secondNumber): JsonResource
    {
        return $this->performOperation('-', $firstNumber, $secondNumber);

    }

    /**
     * Multiplication operation implementation
     */
    public function multiplicationOperation(float $firstNumber, float $secondNumber): JsonResource
    {
        return $this->performOperation('*', $firstNumber, $secondNumber);

    }

    /**
     * Division operation implementation
     */
    public function divisionOperation(float $firstNumber, float $secondNumber): JsonResource
    {


        return $this->performOperation('/', $firstNumber, $secondNumber);

    }

    /**
     *  Perform the operation based on the operator
     *
     * We Can Directly use only these function, but it's not scalable.
     * Specially if for each operation we need to apply some filters for example for the operand
     */
    private function performOperation(string $operator, float $firstOperand, float $secondOperand): JsonResource
    {
        try {

            $result = match ($operator) {
                '+' => $firstOperand + $secondOperand,
                '-' => $firstOperand - $secondOperand,
                '*' => $firstOperand * $secondOperand,
                '/' => $firstOperand / $secondOperand,
                default => ExceptionResource::make(new \InvalidArgumentException("Invalid operator: $operator")),
            };

            return ResultResource::make((object)['result' => $result]);
        } catch (\Exception $exception) {
            return ExceptionResource::make($exception);
        }
    }
}
