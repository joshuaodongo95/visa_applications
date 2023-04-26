<?php
  
namespace App\Http\Controllers;

use DB;
use App\Models\Fee;
use App\Models\Agent;
use Illuminate\Http\Request;
  
class SearchController extends Controller
{
    public function autocomplete(Request $request)
    {
        $data = Agent::select("name as value", "id")
                    ->where('name', 'LIKE', '%'. $request->get('search'). '%')
                    ->get();
    
        return response()->json($data);
    }
}