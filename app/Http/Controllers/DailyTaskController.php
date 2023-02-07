<?php

namespace App\Http\Controllers;

use App\Models\DailyTask;
use App\Models\Event;
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
        $dataEvent = Event::findOrFail($id);
        return view('dailyTask.create', compact('dataEvent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        $dataEvent = Event::find($id);
        $data = DailyTask::create([
            'event_id' => $dataEvent->id,
            'tanggal' => $request->tanggal,
            'pic' => $request->pic,
            'kegiatan' => $request->kegiatan,
            'status' => $request->status
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
        $data = DailyTask::find($id);
        $data->update([
            'tanggal' => $request->tanggal,
            'pic' => $request->pic,
            'kegiatan' => $request->kegiatan,
            'status' => $request->status
        ]);

        if ($data) {
            return redirect()->route('event')->withStatus('data berhasil diupdate');
        } else {
            return redirect()->back()->withErrors('data gagal diupdate');
        }
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
    }
}
