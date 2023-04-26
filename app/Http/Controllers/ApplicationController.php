<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Fee;
use App\Models\Agent;
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

        $applications = Application::with('agent','user')->get();

        
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
        return view('applications.create2',compact('fees'));
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
            'agent' => 'required',
            'no_of_passports' => 'required'
        ]);

        $no_of_passports = $request->input('no_of_passports');
        $fees = Fee::find(1);
        $unit_cost = $fees->unit_price;
        $discount_percentage = $fees->discount;
        $discount = 0;
        if($discount_percentage > 0){
            $discount = $discount_percentage * $unit_cost;
        }

        $cost = ($unit_cost * $no_of_passports) - $discount;

        $application = new Application;
        $application->agent_id = $request->input('agent_id');
    	$application->no_of_passports = $request->input('no_of_passports');
        $application->user_id = Auth::user()->id;
        $application->total_cost = $cost;
    	$application->save();
        $application->id;

        return redirect()->action(
            [PrintController::class, 'index'], ['id' => $application->id]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fees    = Fee::find(1);
        $application = Application::with('agent')->find($id);

        return view('applications.show',compact('application','fees'));
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
            'no_of_passports' => 'required',
            'collection_date' => 'required'
        ]);
    
        $data = array(
            'agent_id' => $request ->input('agent_id'),
    		'no_of_passports' => $request ->input('no_of_passports'),
    		'collection_date' => $request ->input('collection_date'),
            'total_cost' => $request->input('cost')
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
