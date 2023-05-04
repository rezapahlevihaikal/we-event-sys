<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $revenue = DB::table('events')                
                   ->join('deals','events.product_id','=','deals.id')
                   ->whereIn('deals.id_stage',[3, 4, 5])
                   ->sum('deals.amount_po');

        $budget = DB::table('events')
                  ->where('status_id', '=', 1)
                  ->sum('budget');

        $profit = $revenue - $budget;

        $event = Event::where('status_id', '=', '1')->latest('id')->limit(4)->get();

        return view('home', compact('revenue', 'budget', 'profit', 'event'));
    }
}
