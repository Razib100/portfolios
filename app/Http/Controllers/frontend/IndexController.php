<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\footerInfo;

class IndexController extends Controller
{
    public function index(){
        $footer_info = footerInfo::where(['status'=> 'active'])->orderby('id','DESC')->limit(1)->first();
        return view ('frontend.master',compact(['footer_info']));
    }
}
