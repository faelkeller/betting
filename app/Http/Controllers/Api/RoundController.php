<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RoundRequest;

class RoundController extends Controller
{
    public function store(RoundRequest $request){
        return response()->json([$request->all()]);
    }
}
