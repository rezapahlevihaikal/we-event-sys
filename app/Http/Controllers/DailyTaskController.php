<?php

namespace App\Http\Controllers;

use App\Models\DailyTask;
use App\Models\Event;
use App\Models\Workflow;
use App\Models\DetailWorkflow;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

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
        $workflow = Workflow::get(['id', 'name']);
        // $tipeEvent = TipeEvent::get(['id', 'name']);
        $detail = DetailWorkflow::get(['id', 'tipe_event_id','detail']);
        $dataEvent = Event::findOrFail($id);
        return view('dailyTask.create', compact( 'workflow', 'detail' ,'dataEvent'));
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
            'file' => 'nullable|mimes:mimes:jpg,jpeg,png|max:5120'
        ]);

        $rules = [
            'file' => 'nullable|mimes:jpg,jpeg,png|max:5120'
        ];

        $customMessage = [
            
            'max' => 'The :attribute max :value'
        ];

        $this->validate($request, $rules, $customMessage);

        $headerNameDoc = 'Daily';
        $getId = $dataEvent->id;

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
        $data = DailyTask::find($id);
        return view('dailyTask.edit', compact('data'));
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
            'file' => 'nullable|mimes:jpg,jpeg,png|max:5120'
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

        $data = DailyTask::find($id);
        $data->update([
            'tanggal' => $request->tanggal,
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

    public function fetchWorkflow(Request $request)
    {
        $data['name'] = Workflow::where("workflow_id", $request->workflow_id)
                                ->get(["name", "id"]);
  
        return response()->json($data);
    }

    public function fetchDetail(Request $request)
    {
        $data['detail'] = DetailWorkflow::where("workflow_id", $request->workflow_id)
                                    ->get(["detail", "id"]);
                                      
        return response()->json($data);
    }
}
