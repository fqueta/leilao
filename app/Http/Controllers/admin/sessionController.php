<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class sessionController extends Controller
{
    public function sessionManagerAction(Request $request){
        $ret = false;
        $d = $request->all();
        $ac = isset($d['ac']) ? $d['ac'] : false;
        $key = isset($d['key']) ? $d['key'] : false;
        $value = isset($d['value']) ? $d['value'] : false;
        if($ac && $key){
            if($ac=='push')
                $ret = session()->push($key,$value);
            if($ac=='pull')
                $ret = session()->pull($key,$value);
            if($ac=='forget')
                $ret = session()->forget($key);
        }
        return $ret;
    }
}
