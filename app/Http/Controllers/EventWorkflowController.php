<?php

namespace App\Http\Controllers;

use App\Models\EventWorkflow;
use App\Models\Workflow;
use App\Models\Event;
use Illuminate\Http\Request;

class EventWorkflowController extends Controller
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
        $dataWorkflow = Workflow::get(['id','name']);
        $dataEvent = Event::findOrFail($id);
        return view('event_workflow.create', compact('dataEvent', 'dataWorkflow'));
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
        $eWorkflow = EventWorkflow::create([
            'status_id' => 1,
            'event_id' => $dataEvent->id,
            'workflow_id' => $request->workflow_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'percentage' => $request->percentage,
            'desc' => $request->desc
        ]);

        if ($eWorkflow) {
            return redirect()->route('event.edit', $dataEvent->id)->withStatus('data berhasil diinput');
        } else {
            return redirect()->back()->withErrors('data gagal diinput');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventWorkflow  $eventWorkflow
     * @return \Illuminate\Http\Response
     */
    public function show(EventWorkflow $eventWorkflow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventWorkflow  $eventWorkflow
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eWorkflow = EventWorkflow::find($id);
        return view('event_workflow.edit', compact('eWorkflow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventWorkflow  $eventWorkflow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $eWorkflow = EventWorkflow::find($id);
        $eWorkflow->update([
            'workflow_id' => $request->workflow_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'percentage' => $request->percentage,
            'desc' => $request->desc
        ]);

        if ($eWorkflow) {
            return redirect()->route('event')->withStatus('data berhasil diupdate');
        } else {
            return redirect()->back()->withErrors('data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventWorkflow  $eventWorkflow
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eWorkflow = EventWorkflow::find($id);
        $eWorkflow->update([
            'status_id' => 0
        ]);

        return redirect()->back()->with('success', 'data berahsil dihapus');
    }
}
