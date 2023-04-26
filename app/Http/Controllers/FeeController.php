<?php

namespace App\Http\Controllers;

use DB;
use Hash;
use App\Models\Fee;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;

class FeeController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
         $this->middleware('permission:fees-list|fees-edit', ['only' => ['index']]);
         $this->middleware('permission:fees-edit', ['only' => ['edit','update']]);
         $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fees = Fee::orderBy('id', 'desc')->paginate(5);
        
        return view('fees.list', compact('fees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('fees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'item'=>'required',
            'unit_price' => 'required',
            'discount' => 'required'
        ]);
    
        $input = $request->all();
    
        $fee = Fee::create($input);
    
        return redirect()->route('fees.index')
            ->with('success', 'Fees created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fee = Fee::find($id);

        return view('fees.show', compact('fee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fee = Fee::find($id);
    
        return view('fees.edit', compact('fee'));
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
        $this->validate($request, [
            'item'=>'required',
            'unit_price' => 'required'
        ]);
    
        $input = $request->all();
    
        $fee = Fee::find($id);
        $fee->update($input);
    
        return redirect()->route('fees.index')
            ->with('success', 'Fees info updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Fee::find($id)->delete();

        return redirect()->route('fees.index')
            ->with('success', 'Item deleted successfully.');
    }
}
