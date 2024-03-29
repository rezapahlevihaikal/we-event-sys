<?php

namespace App\Http\Controllers;

use App\Models\DailyTask;
use App\Models\Event;
use App\Models\Workflow;
use App\Models\DetailWorkflow;
// use Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Auth;

class DailyTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        if (Auth::user()->id_core_bisnis == 26) {
            $workflow = Workflow::whereNotIn('id', [2])->get(['id', 'name']);
        } else {
            $workflow = Workflow::get(['id', 'name']);
        }
        // $tipeEvent = TipeEvent::get(['id', 'name']);
        // $detail = DetailWorkflow::get(['id', 'tipe_event_id','detail']);
        $dataEvent = Event::findOrFail($id);
        return view('dailyTask.create', compact( 'workflow', 'dataEvent'));
    }

    public function fetchDetail(Request $request)
    {
        $dataEvent = Event::findOrFail($request->eventID);
        if ($request->workflowID != 4 && $request->workflowID != 5 && $request->workflowID != 6 && $request->workflowID != 8) {
            $details = DetailWorkflow::where([
                'workflow_id' => $request->workflowID,
                'tipe_event_id' => $dataEvent->tipe_id])->pluck('detail', 'id');
        }
        else {
            $details = DetailWorkflow::where('workflow_id',$request->workflowID)->pluck('detail', 'id');
        }
        return response()->json($details);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        
        $dataEvent = Event::find($id);
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
        
        $headerNameDoc = 'Daily';
        $getId = $dataEvent->id;
        // dd($request->$filename);
        if ($request->file) {
            
            $filename = $headerNameDoc."_".$getId.uniqid().".".$request->file->extension();        
            $request->file->move(public_path('uploads/daily_task'), $filename);
        }


        $data = DailyTask::create([
            'workflow_id' => $request->workflow_id,
            'detail_id' => $request->detail_id,
            'status_id' => 1,
            'event_id' => $dataEvent->id,
            'tanggal' => $request->tanggal,
            'url' => $request->url,
            'pic' => $request->pic,
            'kegiatan' => $request->kegiatan,
            'status' => $request->status,
            'file' => $filename
        ]);
        
        if ($data) {
            return redirect()->route('event.edit', $dataEvent->id)->withStatus('data berhasil diinput');
        } else {
            return redirect()->back()->withErrors('data gagal diinput');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DailyTask  $dailyTask
     * @return \Illuminate\Http\Response
     */
    public function show(DailyTask $dailyTask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DailyTask  $dailyTask
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (Auth::user()->id_core_bisnis == 26) {
            $workflow = Workflow::whereNotIn('id', [2])->get(['id', 'name']);
        } else {
            $workflow = Workflow::get(['id', 'name']);
        }
        
        $detail = DetailWorkflow::get(['id', 'tipe_event_id','detail']);
        $data = DailyTask::find($id);
        return view('dailyTask.edit', compact('data', 'detail', 'workflow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DailyTask  $dailyTask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        $request->validate([
            'file' => 'nullable|mimes:jpg,jpeg,png,doc,docx,xlx,xlsx,pdf|max:5120'
        ]);

        $data = DailyTask::find($id);

        $headerNameDoc = 'Daily';
        $end = 'edited';

        if ($request->has('file')) {
            $filename = $headerNameDoc."_".uniqid()."_".$end.".".$request->file->getClientOriginalExtension();
            File::delete(public_path('uploads/daily_task'), $data->file);
            $request->file->move(public_path('uploads/daily_task'), $filename);
        }
        else {
            $filename = $data->file;
        }

        $data->update([
            // 'workflow_id' => $request->workflow_id,
            // 'detail_id' => $request->detail_id,
            'tanggal' => $request->tanggal,
            'url' => $request->url,
            'pic' => $request->pic,
            'kegiatan' => $request->kegiatan,
            'status' => $request->status,
            'file' =>$filename
        ]);

        if ($data) {
            return redirect()->route('event')->withStatus('data berhasil diupdate');
        } else {
            return redirect()->back()->withErrors('data gagal diupdate');
        }
    }

    public function getFileDaily($id)
    {
        $data = DailyTask::where('id', $id)->first();
        $filePath = public_path('uploads/daily_task/'. $data->file);
        // dd($filePath);
        return response()->download($filePath);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DailyTask  $dailyTask
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = DailyTask::find($id);
        $data->update([
            'status_id' => 0
        ]);

        return redirect()->back()->with('success','data berhasil dihapus');
    }
}
