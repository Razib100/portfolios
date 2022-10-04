<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use App\Models\testimonial;
use Illuminate\Http\Request;
use App\Models\footerInfo;
use App\Mail\HelloMail;
use Illuminate\Support\Facades\Mail;
use Redirect;
use Response;

class IndexController extends Controller
{
    public function index(){
        $footer_info = footerInfo::where(['status'=> 'active'])->orderby('id','DESC')->limit(1)->first();
        $testimonial_infos = testimonial::where(['status'=> 'active'])->orderby('id','DESC')->limit(5)->get();
        return view ('frontend.master',compact(['footer_info','testimonial_infos']));
    }

    public function subscribe(Request $request){
        $mail = env('MAIL_USERNAME');
        $this->validate($request,[
            'email' => 'email|required',
            'message' => 'string|required',
        ]);

        $data = $request->all();
        $status = Subscriber::create($data);

        if($status){
            Mail::to($mail)
                ->send(new \App\Mail\HelloMail());
            return Redirect::back()->with('success','Email sent Successfully');;
        }
        else{
            return Redirect::back()->with('error', 'Something went wrong');;
        }
    }

    public function getDownload()
    {

        $filePath = public_path(). "/download/RazibHasanResume.pdf";
        $headers = ['Content-Type: application/pdf'];
        $fileName = time().'.pdf';

        return response()->download($filePath, $fileName, $headers);
    }
}
