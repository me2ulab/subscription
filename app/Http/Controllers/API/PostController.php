<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostValidationRequest;
use App\Http\Services\PostServices;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $post_serv;
    function __construct( PostServices $post_serv)
    {
        $this->post_serv = $post_serv;
    }
    public function store(PostValidationRequest $request)
    {
        return $this->post_serv->post($request);
    }
}
