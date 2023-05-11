<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventWorkflow;
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
                   ->where('status_id', '=', '1')
                   ->sum('deals.amount_po');

        $budget = DB::table('events')
                  ->where('status_id', '=', 1)
                  ->sum('budget');

        $profit = $revenue - $budget;

        $event = DB::select('SELECT b.name tipe_award,a.tema,a.schedule, a.budget,a.tipe_id,a.id as event_id,ROUND(c.bobot, 2) as persen , d.sales,c.event_id
                            from events a 
                            left join tipe_events b on b.id=a.tipe_id 
                            left join (SELECT sum(bobot)/6 as bobot,a.event_id from daily_tasks a 
                                    inner join detail_workflows b on a.detail_id=b.id
                                    where status = "done" and a.workflow_id != 8 and a.status_id=1 group by 2) c on a.id=c.event_id 
                            left join (select sum(amount_po) as sales,id_product from deals where  id_stage in (3,5,6,7) group by 2) d on d.id_product=a.product_id
                            WHERE a.status_id = 1 and schedule >= CURRENT_DATE ORDER BY SCHEDULE DESC');

        return view('home', compact('revenue', 'budget', 'profit', 'event'));
    }
}
