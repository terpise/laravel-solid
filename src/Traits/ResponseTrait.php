<?php

namespace Terpise\Solid\Traits;

trait ResponseTrait
{
    protected function formatData($data)
    {
        return is_array($data) && array_key_exists('data', $data) ? $data : ['data' => $data];
    }

    protected function formatResponse($message, $data, $code)
    {
        return response()->json(array_merge_recursive([
            'meta' => [
                'code' => $code,
                'message' => $message != "" ? $message : $this->getMessage($code)
            ]
        ], $this->formatData($data)))->setStatusCode($code);
    }

    protected function getMessage($code)
    {
        switch ($code) {
            case 200:
                $message = 'OK';
                break;
            case 400:
                $message = 'Bad Request';
                break;
            case 401:
                $message = 'Unauthorized';
                break;
            case 403:
                $message = 'Forbidden';
                break;
            case 404:
                $message = 'Not Found';
                break;
            case 422:
                $message = 'Unprocessable Content';
                break;
            case 500:
                $message = 'Internal Server Error';
                break;
            default:
                $message = '';
        }
        return $message;
    }

    public function responseData($data, $code = 200)
    {
        return $this->responseSuccess('', $data, $code);
    }

    public function responseSuccess($message = '', $data = [], $code = 200)
    {
        return $this->formatResponse($message, $data, $code);
    }

    public function responseErrors($message = '', $data = [], $code = 422)
    {
        return $this->formatResponse($message, $data, $code);
    }

    public function responseBadRequest($message = null, $data = [])
    {
        return $this->formatResponse($message, $data, 400);
    }

    public function responseNotFound($message = null, $data = [])
    {
        return $this->formatResponse($message, $data, 404);
    }

    public function responseForbidden($message = null, $data = [])
    {
        return $this->formatResponse($message, $data, 403);
    }

    public function responseInternalServerError($message = null, $data = [])
    {
        return $this->formatResponse($message, $data, 500);
    }
}
