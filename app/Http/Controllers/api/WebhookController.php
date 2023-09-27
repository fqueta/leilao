<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function index(Request $request){
        $seg1 = request()->segment(1);
        $seg2 = request()->segment(2);
        return $seg1.' '.$seg2;
    }
}
