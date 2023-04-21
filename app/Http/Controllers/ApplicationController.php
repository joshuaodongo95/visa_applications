<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Fee;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
class ApplicationController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
         $this->middleware('permission:application-list|application-create|application-edit|application-delete', ['only' => ['index','store']]);
         $this->middleware('permission:application-create', ['only' => ['create','store']]);
         $this->middleware('permission:application-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:application-delete', ['only' => ['destroy']]);
         $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $applications = Application::all();
        
        return view('applications.list', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fees = Fee::find(1);
        return view('applications.create',compact('fees'));
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
            'company' => 'required',
            'no_of_passports' => 'required',
            'collection_date' => 'required'
        ]);

        $no_of_passports = $request->input('no_of_passports');
        $fees = Fee::find(1);
        $unit_cost = $fees->unit_cost;
        $cost = $unit_cost * $no_of_passports;

        $application = new Application;
    	$application->company = $request->input('company');
    	$application->no_of_passports = $request->input('no_of_passports');
        $application->agent = Auth::user()->name;
        $application->collection_date = $request->input('collection_date');
        $application->cost = $cost;
    	$application->save();
        return redirect()->route('applications.index')
            ->with('success', 'Client Visa Application submitted successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = Application::find($id);

        return view('applications.show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $application = Application::find($id);
    
        return view('applications.edit', compact('application'));
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
            'company' => 'required',
            'no_of_passports' => 'required',
            'collection_date' => 'required'
        ]);
    
        $data = array(
    		'company' => $request ->input('company'),
    		'no_of_passports' => $request ->input('no_of_passports'),
    		'collection_date' => $request ->input('collection_date'),
            'cost' => $request->input('cost')
    		);
    	Application::where('id', $id)->update($data);
        
        return redirect()->route('applications.index')
            ->with('success', 'Visa Application info updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Application::find($id)->delete();

        return redirect()->route('applications.index')
            ->with('success', 'Visa Application deleted successfully.');
    }
}
