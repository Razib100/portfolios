<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Bank::orderBy('id', 'DESC')->get();
        return view('backend.bank.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.bank.create');
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
            'name'       => 'string|required',
            'acc_no' => 'string|required',
        ]);
        $data       = $request->all();
        $status       = Bank::create($data);
        if($status){
            return redirect()->route('bank.index')->with('success', 'Bank create successfully');
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
        $bank = Bank::find($id);
        if($bank){
            return view('backend.bank.edit', compact('bank'));
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
        $bank = Bank::find($id);
        if($bank){
            $this->validate($request,[
                'name'       => 'string|required',
                'acc_no' => 'string|required',
            ]);
            $data       = $request->all();
            $status       = $bank->fill($data)->save();
            if($status){
                return redirect()->route('bank.index')->with('success', 'Bank update successfully');
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
        $bank = Bank::find($id);
        if($bank){
            $status = $bank->delete($id);
            if($status){
                return redirect()->route('bank.index')->with('success', 'Bank delete successfully');
            }
            else {
                return back()->with('error', 'Something went wrong!');
            }
        }
        else{
            return back()->with('error', 'Data not found!');
        }
    }
}
