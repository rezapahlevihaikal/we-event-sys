<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventBudget;
use App\Models\TipeEvent;
use App\Models\Product;
use App\Models\Workflow;
use App\Models\EventWorkflow;
use App\Models\Sponsor;
use App\Models\Keynote;
use App\Models\DailyTask;
use App\Models\Dokumentasi;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use DB;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data =Event::where('status_id', '=', '1')->latest('id')->get();
        return view('event.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $dataProduct = Product::get(['id', 'name']);
        $dataTipeEvent = TipeEvent::get(['id', 'name']);

        return view('event.create', compact('dataProduct', 'dataTipeEvent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $filename = null;
        $request->validate([
            'file' => 'nullable|mimes:mimes:jpg,jpeg,png,doc,docx,xlx,xlsx,pdf|max:5120'
        ]);

        $rules = [
            'file' => 'nullable|mimes:jpg,jpeg,png,doc,docx,xlx,xlsx,pdf|max:5120'
        ];

        $customMessage = [
            
            'max' => 'The :attribute max :value'
        ];

        $this->validate($request, $rules, $customMessage);

        $headerNameDoc = 'fileEvent';

        if ($request->file) {
            
            $filename = $headerNameDoc."_".uniqid().".".$request->file->extension();        
            $request->file->move(public_path('uploads/file_event'), $filename);
        }        
        

        $data = Event::create([
            'status_id' => 1,
            'tipe_id' => $request->tipe_id,
            'tema'    => $request->tema,
            'product_id' => $request->product_id,
            'lokasi' => $request->lokasi,
            'budget' => str_replace('.', '', $request->budget),
            'schedule' => $request->schedule,
            'on_event' => $request->on_event,
            'file' => $filename,
            'status' => $request->status
        ]);

        if ($data) {
            return redirect()->route('event')->withStatus('data berhasil diinput');
        }
        else {
            return redirect()->back()->withErrors('data gagal diinput');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Event::find($id);
        $dataProduct = Product::get(['id', 'name']);
        $dataTipeEvent = TipeEvent::get(['id', 'name']);
        $dataWorkflow = EventWorkflow::where('event_id', '=', $data->id)->where('status_id', '=', '1')->orderBy('id')->get();
        $dataEb = EventBudget::where('event_id', '=', $data->id)->where('status_id', '=', '1')->latest('created_at')->get();
        $dataS = Sponsor::where('event_id', '=', $data->id)->where('status_id', '=', '1')->latest('created_at')->get();
        $dataK = Keynote::where('event_id', '=', $data->id)->where('status_id', '=', '1')->latest('created_at')->get();
        $dataD = DailyTask::where('event_id', '=', $data->id)->where('status_id', '=', '1')->latest('created_at')->get();
        // $dataD = DB::table('daily_tasks')
        //         ->join('detail_workflows','daily_tasks.detail_id','=','detail_workflows.id')
        //         ->where('daily_tasks.event_id','=',6)
        //         ->where('daily_tasks.status','=','done')
        //         ->where('daily_tasks.workflow_id','=','3')
        //         ->get();
        // $dataD2 = DB::select("SELECT sum(bobot) from daily_tasks a inner join detail_workflows b on a.detail_id=b.id where a.event_id=$id and a.status='done' and a.workflow_id=$dataWorkflow->workflow_id")->get();
        $doc = Dokumentasi::where('event_id', '=', $data->id)->where('status_id', '=', '1')->latest('created_at')->get();
        
        return view('event.edit', compact('dataProduct', 'dataTipeEvent', 'dataWorkflow', 'data', 'dataEb', 'dataS', 'dataK', 'dataD', 'doc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'file' => 'nullable|mimes:jpg,jpeg,png,doc,docx,xlx,xlsx,pdf|max:5120'
        ]);

        $data = Event::find($id);

        $headerNameDoc = 'fileEvent';
        $end = 'edited';

        if ($request->has('file')) {
            $filename = $headerNameDoc."_".uniqid()."_".$end.".".$request->file->getClientOriginalExtension();
            File::delete(public_path('uploads/file_event'), $data->file);
            $request->file->move(public_path('uploads/file_event'), $filename);
        }
        else {
            $filename = $data->file;
        }

        $data->update([
            'tipe_id' => $request->tipe_id,
            'tema'    => $request->tema,
            'product_id' => $request->product_id,
            'lokasi' => $request->lokasi,
            'budget' => str_replace('.', '', $request->budget),
            'schedule' => $request->schedule,
            'on_event' => $request->on_event,
            'file' => $filename,
            'status' => $request->status
        ]);

        if ($data) {
            return redirect()->route('event')->withStatus('data berhasil diupdate');
        }
        else {
            return redirect()->back()->withErrors('data gagal diupdate');
        }   
    }

    public function upload(Request $request, $id)
    {
        $dataEvent = Event::find($id);

    	$this->validate($request, [
    		'title' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $input['file'] = 'doc'.'_'.time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('uploads/documentation'), $input['file']);

        $input['status_id'] = 1;
        $input['event_id'] = $dataEvent->id;
        $input['title'] = $request->title;
        Dokumentasi::create($input);


    	return back()
    		->with('success','Image Uploaded successfully.');
    }

    public function getFileEvent($id)
    {
        $data = Event::where('id', $id)->first();
        $filePath = public_path('uploads/'. $data->file);
        // dd($filePath);
        return response()->download($filePath);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Event::find($id);
        $data->update([
            'status_id' => 0
        ]);
        return redirect()->back()->with('success', 'data berhasil dihapus');
    }

}
