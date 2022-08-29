<?php 
if(!function_exists('successResponse'))
{
    function successResponse($arg=[])
    {
        $response['success'] = $arg['success'] ?? true;
        $response['status'] = $arg['status'] ?? 200;
        $response['message'] = $arg['message'] ?? 'success';
        $response['data'] = $arg['data'] ?? '';
        return response()->json($response,$response['status']);

    }
}
if(!function_exists('failureResponse'))
{
    function failureResponse($arg=[])
    {
        $response['success'] = $arg['success'] ?? false;
        $response['status'] = $arg['status'] ?? 500;
        $response['message'] = $arg['message'] ?? 'Oops, something went wrong, try later or contact the admin';
        $response['data'] = $arg['data'] ?? '';
        return response()->json($response, $response['status']);

    }

}