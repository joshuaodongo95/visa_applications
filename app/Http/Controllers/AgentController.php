<?php

namespace App\Http\Controllers;

use DB;
use Hash;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;

class AgentController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
         $this->middleware('permission:agent-list|agent-create|agent-edit|agent-delete', ['only' => ['index','store']]);
         $this->middleware('permission:agent-create', ['only' => ['create','store']]);
         $this->middleware('permission:agent-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:agent-delete', ['only' => ['destroy']]);
         $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $agents = Agent::all();
        
        return view('agents.list', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('agents.create');
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
            'company'=>'required',
            'name' => 'required',
            'email' => 'required|email|unique:agents,email',
            'telephone' => 'required',
            'address' => 'required'
        ]);
    
        $input = $request->all();
    
        $agent = Agent::create($input);
    
        return redirect()->route('agents.index')
            ->with('success', 'Agent created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agent = Agent::find($id);

        return view('agents.show', compact('agent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agent = Agent::find($id);
    
        return view('agents.edit', compact('agent'));
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
            'company'=>'required',
            'name' => 'required',
            'email' => 'required|email|unique:agents,email',
            'telephone' => 'required|unique:agents,telephone',
            'address' =>'required'
        ]);
    
        $input = $request->all();
    
        $agent = Agent::find($id);
        $agent->update($input);
    
        return redirect()->route('agents.index')
            ->with('success', 'Agent info updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Agent::find($id)->delete();

        return redirect()->route('agents.index')
            ->with('success', 'Agent info deleted successfully.');
    }
}
