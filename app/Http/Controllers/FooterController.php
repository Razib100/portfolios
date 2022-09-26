<?php

namespace App\Http\Controllers;

use App\Models\footerInfo;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = footerInfo::orderby('id','DESC')->get();
        return view('backend.footer.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.footer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'summary' => 'string|required',
           'description' => 'string|required',
           'summary' => 'string|required',
           'address' => 'string|required',
           'email' => 'string|required',
           'phone' => 'string|required',
           'social_media_link' => 'string|required',
           'social_media_image' => 'string|required',

        ]);

        $data = $request->all();
        $status = footerInfo::create($data);
        if($status){
            return reredirect()->route('footer.index')->with('success','Footer Informtion Create Successfully');
        }
        else{
            return back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function footerStatus(Request $request){
        if($request->mode == 'true'){
            DB::table('footer_infos')->where('id', $request->id)->update(['status' => 'active']);
        } else{
            DB::table('footer_infos')->where('id', $request->id)->update(['status' => 'inactive']);
        }
        return response()->json(['msg' => 'Successfully updated status', 'status' => true]);
    }
}
