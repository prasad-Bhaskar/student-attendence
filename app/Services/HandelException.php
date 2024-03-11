<?php

namespace App\Services;

use Exception;

class HandelException
{
    private $responseService;
    public function __construct(ResponseService $response)
    {
        $this->responseService = $response;
    }
    public function handle(callable $function){
        try {
            return $function;
        } catch (Exception $e) {
            return $this->responseService->internalServerError($e->getMessage());
        }
    }    
}