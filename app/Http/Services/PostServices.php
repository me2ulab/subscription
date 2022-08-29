<?php
namespace App\Http\Services;

use App\Jobs\SendSubscriptionEmailJob;
use App\Models\Post;

use function PHPUnit\Framework\throwException;

class PostServices
{
    public function post($request)
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
            $result = Post::create($data);
            return successResponse([
                'message'=> 'Post Created succefully',
                'data' => $data
            ]);
            SendSubscriptionEmailJob::dispatch($data);
        }
        catch(\Exception $ex)
        {
            throwException($ex);
        }
    }
}