<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Fee;
use App\Models\Agent;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class ProfileController extends Controller
{
    function __construct()
    {
         $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //$applications = Application::all();

        $applications = DB::table('applications')
            ->where('applications.created_by','=',Auth::user()->name)
            ->join('agents', 'applications.agent_id', '=', 'agents.id')
            ->select('applications.*', 'agents.name')
            ->get();

        
        return view('profile.list', compact('applications'));
    }

}
