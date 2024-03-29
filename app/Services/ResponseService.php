<?php 

namespace App\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ResponseService 
{

    public function continue(string $message, array $data):JsonResponse{
        $responseData  = $this->dataFormat($message, $data, Response::HTTP_CONTINUE);
        return response()->json($responseData, Response::HTTP_CONTINUE);
    }

    public function switchingProtocols(string $message, array $data):JsonResponse{
        $responseData  = $this->dataFormat($message, $data, Response::HTTP_SWITCHING_PROTOCOLS);
        return response()->json($responseData, Response::HTTP_SWITCHING_PROTOCOLS);
    }

    public function internalServerError(string $message, ){
        $responseData = $this->dataFormat($message, [], Response::HTTP_INTERNAL_SERVER_ERROR);
        return response()->json($responseData, Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    private function dataFormat(string $message, array $data, int $status){
        return array(['message' => $message, 'data'=>$data, 'status' => $status]);
    }

}