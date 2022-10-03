<?php

namespace App\Http\Controllers;

use App\Models\testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = testimonial::orderby('id','DESC')->get();
        return view('backend.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.testimonial.create');
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
            'feedback' => 'string|required',
            'name' => 'string|required',
            'designation' => 'string|required',
            'photo' => 'string|required',
        ]);

        $data = $request->all();
        $data['feedback'] = trim($data['feedback'], "<p>");
        $data['feedback'] = rtrim($data['feedback'], "</p>");
        $status = testimonial::create($data);
        if($status){
            return redirect()->route('testimonial.index')->with('success','Testimonial Information Create Successfully');
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
        $info = testimonial::find($id);
        if($info){
            return view('backend.testimonial.edit', compact('info'));
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
        $info = testimonial::find($id);
        if($info){
            $this->validate($request,[
                'summary' => 'string|required',
                'feedback' => 'string|required',
                'name' => 'string|required',
                'designation' => 'string|required',
                'photo' => 'string|required',
            ]);
            $data       = $request->all();
            $data['feedback'] = trim($data['feedback'], "<p>");
            $data['feedback'] = rtrim($data['feedback'], "</p>");
            $status       = $info->fill($data)->save();
            if($status){
                return redirect()->route('testimonial.index')->with('success', 'Testimonial Information update successfully');
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
        $info = testimonial::find($id);
        if($info){
            $status = $info->delete($id);
            if($status){
                return redirect()->route('testimonial.index')->with('success', 'Testimonial Information delete successfully');
            }
            else {
                return back()->with('error', 'Something went wrong!');
            }
        }
        else{
            return back()->with('error', 'Data not found!');
        }
    }
    public function testimonialStatus(Request $request){
        if($request->mode == 'true'){
            testimonial::where('id', $request->id)->update(['status' => 'active']);
        } else{
            testimonial::where('id', $request->id)->update(['status' => 'inactive']);
        }
        return response()->json(['msg' => 'Successfully updated status', 'status' => true]);
    }
}
