<?php 
namespace App\Http\Services;
use App\Models\subscription;
use function PHPUnit\Framework\throwException;

class SubscriptionServices
{
    public function subscribe($request)
    {
        if(!$data = $request->getAttributes())
        {
            return failureResponse(
                [
                    'message' => 'Invalid parameters passed',
                    'status' => 400
                ]
                );
        }
        try{
            $result = subscription::create($data);
            return successResponse([
                'message'=> 'Post Created succefully',
                'data' => $data
            ]);
        }
        catch(\Exception $ex)
        {
            throwException($ex);
        }
        return successResponse();
    }
}