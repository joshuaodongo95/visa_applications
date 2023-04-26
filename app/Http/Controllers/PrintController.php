<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Fee;
use App\Models\Agent;
use App\Models\Application;
use Illuminate\Http\Request;

class PrintController extends Controller
{  
    function __construct()
    {
         $this->middleware('auth');
    }
    public function index($id){

        $fees    = Fee::find(1);
        $application = Application::with('agent','user')->find($id);

        return view('applications.print',compact('application','fees'))
                    ->with('success', 'Visa Application submitted successfully.');
    }
}
