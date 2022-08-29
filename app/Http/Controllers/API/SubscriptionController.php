<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Services\SubscriptionServices;
use App\Http\Requests\subscriptionValidationRequest;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    protected $subscribe_serv;
    function __construct( SubscriptionServices $subscribe_serv)
    {
        $this->subscribe_serv = $subscribe_serv;
    }
    public function store(subscriptionValidationRequest $request)
    {
        return $this->subscribe_serv->subscribe($request);
    }
}
