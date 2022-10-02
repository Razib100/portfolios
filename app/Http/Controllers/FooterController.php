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
           'address' => 'string|required',
           'email' => 'string|required',
           'phone' => 'string|required',
           'social_media_link' => 'string|required',
           'social_media_image' => 'string|required',

        ]);

        $data = $request->all();
        $status = footerInfo::create($data);
        if($status){
            return redirect()->route('footer.index')->with('success','Footer Information Create Successfully');
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
        $info = footerInfo::find($id);
        if($info){
            return view('backend.footer.edit', compact('info'));
        }
        else{
            return back()->with('error', 'Data not found!');
        }
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
        $info = footerInfo::find($id);
        if($info){
            $this->validate($request,[
                'summary' => 'string|required',
                'description' => 'string|required',
                'address' => 'string|required',
                'email' => 'string|required',
                'phone' => 'string|required',
                'social_media_link' => 'string|required',
                'social_media_image' => 'string|required',

            ]);
            $data       = $request->all();
            $status       = $info->fill($data)->save();
        if($status){
            return redirect()->route('footer.index')->with('success', 'Footer Information update successfully');
        }
        else{
            return back()->with('error', 'Something went wrong');
        }
        }
        else{
            return back()->with('error', 'Data not found!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = footerInfo::find($id);
        if($info){
            $status = $info->delete($id);
            if($status){
                return redirect()->route('footer.index')->with('success', 'Footer Information delete successfully');
            }
            else {
                return back()->with('error', 'Something went wrong!');
            }
        }
        else{
            return back()->with('error', 'Data not found!');
        }
    }

    public function footerStatus(Request $request){
        if($request->mode == 'true'){
            footerInfo::where('id', $request->id)->update(['status' => 'active']);
        } else{
            footerInfo::where('id', $request->id)->update(['status' => 'inactive']);
        }
        return response()->json(['msg' => 'Successfully updated status', 'status' => true]);
    }
}
